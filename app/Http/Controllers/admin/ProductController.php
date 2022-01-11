<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DeliveryTime;
use App\Models\Admin\ManufacturingCompany;
use App\Models\Admin\ProductFlag;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\SellType;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('pages.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tax = Tax::get(['id', 'tax']);
        $delivery_times = DeliveryTime::get(['id', 'from', 'to', 'type']);
        $categories = Category::get(['id', 'name']);
        $sub_categories = SubCategory::get(['id', 'name']);
        $manafacturing_companies = ManufacturingCompany::get(['id', 'name']);
        $sell_types = SellType::get(['id', 'name']);
        $flags = ProductFlag::get(['id', 'name']);
        $unit = Unit::get(['id', 'name']);
        $countries = Country::get();
        $tags = Tag::get();
        return view('pages.admin.product.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name_de' => 'required|string',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'description_de' => 'required|string',
            'tax' => 'required|numeric',
            'price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'offer_price' => 'required|numeric',
            'qty' => 'required|numeric',
            'min_qty' => 'sometimes|numeric',
            'max_qty' => 'sometimes|numeric',
            'no_product' => 'sometimes|numeric',
            'barcode' => 'sometimes|string',
            'weight' => 'sometimes|numeric',
            'delivery_time_id' => 'sometimes|numeric',
            'manufacturing_company_id' => 'sometimes|numeric',
            'sell_type_id' => 'sometimes|numeric',
            'flag_id' => 'sometimes|numeric',
            'unit_id' => 'sometimes|numeric',
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'tag_id' => 'sometimes',
            'status' => 'sometimes',
            'bro_product' => 'sometimes',
        ]);

        try {
            $product = Product::create([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de'],
                ],
                'description' => [
                    'ar' => $data['description_ar'],
                    'de' => $data['description_de'],
                ],
                'slug' => [
                    'ar' => Str::slug($data['name_ar']),
                    'de' => Str::slug($data['name_de'])
                ],
                'tax_id' => $data['tax'],
                'price' => $data['price'],
                'purchase_price' => $data['purchase_price'],
                'offer_price' => $data['offer_price'],
                'qty' => $data['qty'],
                'min_qty' => $data['min_qty'],
                'max_qty' => $data['max_qty'],
                'barcode' => $data['barcode'],
                'weight' => $data['weight'],
                'delivery_time_id' => $data['delivery_time_id'],
                'manufacturing_company_id' => $data['manufacturing_company_id'],
                'sell_type_id' => $data['sell_type_id'],
                'flag_id' => $data['flag_id'],
                'unit_id' => $data['unit_id'],
                'category_id' => $data['category_id'],
                'sub_category_id' => $data['sub_category_id'],
                'status' => $data['status'] == "on" ? 1 : 0,
                'no_product' => $data['no_product'],
                'country_id' => $data['country_id'],
                'tags' => json_encode($data['tag_id']),
                'bro_product' => $data['bro_product'] == "on" ? 1 : 0,
            ]);

            foreach ($request->input('document', []) as $file) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('product');
            }

            toast('Your added product successfully', 'success');

            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            toast('Something error !', 'error');

            return redirect()->route('products.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        $tax = Tax::get(['id', 'tax']);
        $delivery_times = DeliveryTime::get(['id', 'from', 'to', 'type']);
        $categories = Category::get(['id', 'name']);
        $sub_categories = SubCategory::get(['id', 'name']);
        $manafacturing_companies = ManufacturingCompany::get(['id', 'name']);
        $sell_types = SellType::get(['id', 'name']);
        $flags = ProductFlag::get(['id', 'name']);
        $unit = Unit::get(['id', 'name']);
        $countries = Country::get();
        $tags = Tag::get();
        $sub_categories = SubCategory::get(['id', 'name']);


        return view('pages.admin.product.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name_de' => 'required|string',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'description_de' => 'required|string',
            'tax' => 'required|numeric',
            'price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'offer_price' => 'required|numeric',
            'qty' => 'required|numeric',
            'min_qty' => 'sometimes|numeric',
            'max_qty' => 'sometimes|numeric',
            'no_product' => 'sometimes|numeric',
            'barcode' => 'sometimes|string',
            'weight' => 'sometimes|numeric',
            'delivery_time_id' => 'sometimes|numeric',
            'manufacturing_company_id' => 'sometimes|numeric',
            'sell_type_id' => 'sometimes|numeric',
            'flag_id' => 'sometimes|numeric',
            'unit_id' => 'sometimes|numeric',
            'category_id' => 'required|numeric',
            'sub_category_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'tag_id' => 'sometimes',

        ]);

        try {
            $product->update([
                'name' => [
                    'ar' => $data['name_ar'],
                    'de' => $data['name_de'],
                ],
                'description' => [
                    'ar' => $data['description_ar'],
                    'de' => $data['description_de'],
                ],
                'slug' => [
                    'ar' => Str::slug($data['name_ar']),
                    'de' => Str::slug($data['name_de'])
                ],
                'tax_id' => $data['tax'],
                'price' => $data['price'],
                'purchase_price' => $data['purchase_price'],
                'offer_price' => $data['offer_price'],
                'qty' => $data['qty'],
                'min_qty' => $data['min_qty'],
                'max_qty' => $data['max_qty'],
                'barcode' => $data['barcode'],
                'weight' => $data['weight'],
                'delivery_time_id' => $data['delivery_time_id'],
                'manufacturing_company_id' => $data['manufacturing_company_id'],
                'sell_type_id' => $data['sell_type_id'],
                'flag_id' => $data['flag_id'],
                'unit_id' => $data['unit_id'],
                'category_id' => $data['category_id'],
                'sub_category_id' => $data['sub_category_id'],
                'status' => $request->status == "on" ? 1 : 0,
                'no_product' => $data['no_product'],
                'country_id' => $data['country_id'],
                'tags' => json_encode($data['tag_id']),
                'bro_product' => $request->bro_product == "on" ? 1 : 0,
            ]);

            foreach ($request->input('document', []) as $file) {
                $product->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('product');
            }

            toast('Your update product successfully', 'success');

            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            toast('Something error !', 'error');

            return redirect()->route('products.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            toast('Your delete product successfully', 'success');

            return redirect()->route('products.index');

        } catch (\Exception $exception) {
            toast('Something error !', 'error');

            return redirect()->route('products.index');

        }
    }

    public function get_sub_category(Request $request)
    {
        $sub_categories = SubCategory::where('category_id', $request->category_id)->get();

        return response()->json([
            'sub_categories' => $sub_categories
        ]);
    }

    public function storeMedia(Request $request)
    {

        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function delete_image(Request $request){
        $media =  Media::find($request->image_id);
        $media->delete();
        return response()->json("delete image successfully");
    }
}
