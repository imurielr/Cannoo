<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Interfaces\ImageStorage;
    use App\Product;

    class ProductController extends Controller {

        public function create() {
            return view('product.create');
        }

        public function save(Request $request) {
            Product::validate($request);
            $product = Product::create($request->only(["type","price","description"]));

            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request, "product", $product->getId());


            return back()->with('success','Item created successfully!');
        }

        public function show() {
            $data = []; // Data to be sent to de view

            $data["title"] = "Products";
            $data["products"] = Product::all();

            return view('product.show')->with("data", $data);
        }

        public function showProduct($id) {
            $data = []; //to be sent to the view
            $product = Product::findOrFail($id);

            $data["title"] = $product->getType();
            $data["product"] = $product;

            return view('product.showProduct')->with("data",$data);
        }

        public function delete($id) {
            Product::find($id)->delete();
            
            return redirect()->route('product.show');
        }

        public function changeDescription($id) {
            $data = [];
            $product = Product::find($id);

            $data["title"] = $product->getType();
            $data["product"] = $product;

            return view('product.update')->with("data", $data);
        }

        public function update(Request $request, $id) {
            $request->validate([
                "description" => "required"
            ]);
            
            $product = Product::find($id);

            $product->setDescription($request["description"]);
            $product->save();

            return redirect()->route('product.show');
        }

        public function like($id){
            $likes = Product::select('likes')->where('id', $id)->get();
            Product::where('id',  $id)->update(['likes' => $likes[0]['likes']+1]);
            return redirect()->route('product.show');
        }

    }