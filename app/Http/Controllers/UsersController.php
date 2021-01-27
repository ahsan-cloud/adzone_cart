<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use DB;
use App\State;
use App\MainCategory;
use App\SubCategory;
use App\Advertisement;

class UsersController extends Controller
{
    public function index(){
    	$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    				//dd($categories);
    	return view('users.user',['categories'=>$categories]);
    }
    public function fetch(Request $request){
    	if($request->get('indiastates')){
    		$query=$request->get('indiastates');
            //dd($query);
    		$data= DB::table('states')
    			    ->where('stateName', 'like', '%'.$query.'%')
    			    ->get();
    		$output ='<ul style="display:block !important" class="dropdown-menu">';
    		if($data->count()>0){
    			foreach($data as $row){
    				$output .='<li class="searchState" id="search" name="searchState" value='.$row->id.'>'.$row->stateName.'</li>';
    			}
    			$output .='</ul>';
    			echo $output;
    		}
    		else{
    			$output .='<li>Record not Found</li>';
    			echo $output;
    		}
    	}
    }
    public function cities(Request $request){
    	if($request->get('id')){
    		$query=$request->get('id');
    		$data=DB::table('cities')
    			  ->where('stateId','like','%'.$query.'%')
    			  ->get();
    		$output ='';
    		if($data->count()>0){
    			foreach($data as $row){
    				$output .='<li id="searchCity" name="searchCity" style="cursor:pointer;">'.$row->cityName.'</li>';
    			}
    			$output .='';
    			echo $output;
    		}
    		else{
    			$output .='<li>City not Found</li>';
    			echo $output;
    		}
    	}
    }
    public function retrieve(Request $request){
    	$data=DB::table('main_categories')->get();
    	$output ='';
    		if($data->count()>0){
    			foreach($data as $row){
    				$output .='<option value='.$row->id.'>'.$row->maincategory.'</option>';
    			}
    			$output .='';
    			echo $output;
    		}
    }
    public function adpost(){
    	$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    				//dd($categories);
    	return view('users.adpost',['categories'=>$categories]);
    }
    public function categories(Request $request , $maincategory, $id){
    	if($id == 2){
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
     				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		$subcategories=DB::table('sub_categories')
    				->select('*')
    				->leftjoin('main_categories','sub_categories.maincategoryid','=',
    					'main_categories.id')
    				->where(['main_categories.id'=>$id])
    				->get();
    		$states=State::all();
    		return view('users.publishad.carsbikes',['categories'=>$categories,'subcategories'=>
    				$subcategories,'states'=>$states]);
    	}
    	elseif ($id == 3) {
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		$subcategories=DB::table('sub_categories')
    				->select('*')
    				->leftjoin('main_categories','sub_categories.maincategoryid','=',
    					'main_categories.id')
    				->where(['main_categories.id'=>$id])
    				->get();
    		$states=State::all();
    		return view('users.publishad.carsbikes',['categories'=>$categories,'subcategories'=>
    				$subcategories,'states'=>$states]);
    	}
    	elseif($id == 4){
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		$subcategories=DB::table('sub_categories')
    				->select('*')
    				->leftjoin('main_categories','sub_categories.maincategoryid','=',
    					'main_categories.id')
    				->where(['main_categories.id'=>$id])
    				->get();
    		$states=State::all();
    		return view('users.publishad.carsbikes',['categories'=>$categories,'subcategories'=>
    				$subcategories,'states'=>$states]);
    	}
    	elseif ($id == 5) {
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		return view('users.publishad.building',['categories'=>$categories]);
    	}
    	elseif ($id == 6) {
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		return view('users.publishad.suitcase',['categories'=>$categories]);
    	}
    	elseif ($id == 7) {
    		$categories=DB::table('main_categories')
    				->select('main_categories.id','main_categories.maincategory',
    				'icons.icons')
    				->leftjoin('icons', 'icons.categoryId','=','main_categories.id')
    				->get();
    		return view('users.publishad.services',['categories'=>$categories]);
    	}
    }
    public function postCarsBikes(Request $request){
    	$this->validate($request,[
    		'subcategoryid'=>'required',
    		'productname'=>'required',
    		'yearofpurchase'=>'required',
    		'expsellprice'=>'required',
    		'name'=>'required',
    		'mobile'=>'required',
    		'state'=>'required',
    		'city'=>'required',
    		'photo'=>'required',
    		//'photo.*'=>'image|mimes:jpg,png,jpeg,svg,gif|max:2048',
    	]);
    	//dd('reached');
    	$ads = new Advertisement;
    	$images = $request->file('photo');
    	//dd($images);
		$count=0; 
		$arr = array();
    	if($images){
    		foreach($images as $item){
    			if($count < 4){
    				//$var=date_create();
    				//$date=date_format($var,'Ymd');
    				//$imageName=$date.'_'.$item->getClientOriginalName();
        			$imageName = $item->getClientOriginalName().'-'.time().'.'.$item->extension();     
        			$item->move(public_path('uploads'), $imageName);    
       				//$item=move_uploaded_file(public_path().'/uploads/'.$imageName);
    				$arr[] = \URL::to("/").'/uploads/'.$imageName;
    				$count++;
    			}
    		}
    		//dd($arr);
    		$image=implode(",", $arr);
    		$ads->maincategoryid=$request->input('maincategoryid');
    		$ads->subcategoryid=$request->input('subcategoryid');
    		$ads->productname=$request->input('productname');
    		$ads->yearofpurchase=$request->input('yearofpurchase');
    		$ads->expsellprice=$request->input('expsellprice');
    		$ads->name=$request->input('name');
    		$ads->mobile=$request->input('mobile');
    		$ads->email=$request->input('email');
    		$ads->state=$request->input('state');
    		$ads->city=$request->input('city');
    		$ads->photo=$image;
    		$ads->save();
    		return redirect("/")->with('info','Advertisement published successfully');

    		/*$data=array(
    			'maincategoryid'=>$ads->maincategoryid,
    			'subcategoryid'=>$ads->subcategoryid,
    			'productname'=>$ads->productname,
    			'yearofpurchase'=>$ads->yearofpurchase,
    			'expsellprice'=>$ads->expsellprice,
    			'name'=>$ads->name,
    			'mobile'=>$ads->mobile,
    			'email'=>$ads->email,
    			'state'=>$ads->state,
    			'city'=>$ads->city,
    			'photo'=>$ads->photo,
    		);
    		echo "<pre>";
    		print_r($data);
    		echo "</pre>";*/
    	} 
    }
    public function getAds(){
    	$ads=Db::table('Advertisements')->get();
    	$output='';
    	if($ads->count()>0){
    		foreach($ads as $row){
    			$output.='<div class="col-md-3">
    			<div>
    			<img src='.strtok($row->photo, ',').' style="padding:10px!important;
    			width:100%; height:182px;">
    			<h3>'.$row->productname.'</h3>
    			<p>'.$row->expsellprice.'</p>
    			<p>'.$row->city.'</p>

    			<a href='.$_SERVER['HTTP_REFERER'].'product/view/'.$row->id.'>VIEW</a>
    			</div>
    			</div>
    			';
    		}
    		$output.='';
    		echo $output;
    	}
    	else{
    		$output.='<p>Not Found</p>';
    		echo $output;
    	}
    }
	public function viewAds(Request $request, $maincategory, $id){
		if($id == 2){
			$categories=DB::table('main_categories')
					   ->select('main_categories.id','main_categories.maincategory',
						'icons.icons')
					   ->leftjoin('icons','icons.id','=','main_categories.id')
					   ->get();
			$carsBikes=DB::table('Advertisements')
					   ->where(['maincategoryid'=>$id])
					   ->get();
			return view('users.categories.carsbikes',['categories'=>$categories,'carsBikes'=>$carsBikes]);
		}
		elseif ($id == 3) {
					$categories=DB::table('main_categories')
					   ->select('main_categories.id','main_categories.maincategory',
						'icons.icons')
					   ->leftjoin('icons','icons.id','=','main_categories.id')
					   ->get();
					$mobiles=DB::table('Advertisements')
					   ->where(['maincategoryid'=>$id])
					   ->get();
			return view('users.categories.mobiles',['categories'=>$categories,'mobiles'=>$mobiles]);
		}
		elseif ($id == 4) {
					$categories=DB::table('main_categories')
					   ->select('main_categories.id','main_categories.maincategory',
						'icons.icons')
					   ->leftjoin('icons','icons.id','=','main_categories.id')
					   ->get();
					$electronics=DB::table('Advertisements')
					   ->where(['maincategoryid'=>$id])
					   ->get();
			return view('users.categories.electronics',['categories'=>$categories,'electronics'=>
					$electronics]);
		}
	} 
	public function searchProduct(Request $request){
		if($request->get('searchonproduct')){
			$query=$request->get('searchonproduct');
			$categories=DB::table('main_categories')
						->select('main_categories.id','main_categories.maincategory','icons.icons')
						->leftjoin('icons','icons.id','=','main_categories.id')
						->get();
			$data=DB::table('Advertisements')
				  ->where('productname','like','%'.$query.'%')
				  ->get();
			return view('users.categories.searchonproduct',['categories'=>$categories,'data'=>$data]);
		}
	} 
	public function searchAdvertisement(Request $request){
		if($request->get('city') && $request->get('categories')){
			$city= $request->get('city');
			$categories= $request->get('categories');
			$data=DB::table('Advertisements')
				 ->where(['city'=>$city, 'maincategoryid'=>$categories])
				 ->get();
			$categories=DB::table('main_categories')
					   ->select('main_categories.id','main_categories.maincategory','icons.icons')
					   ->leftjoin('icons','main_categories.id','=','icons.id')
					   ->get();
			return view('users.categories.searchbyCity&Category',['data'=>$data, 'categories'=>$categories]);
		}
	} 
	public function getProductDetail(Request $request, $id){
			$product=DB::table('Advertisements')
				 	->where(['id'=>$id])
				 	->get();
			$categories=DB::table('main_categories')
					   ->select('main_categories.id','main_categories.maincategory','icons.icons')
					   ->leftjoin('icons','main_categories.id','=','icons.id')
					   ->get();
			return view('users.productView',['categories'=>$categories, 'product'=>$product]);
	} 
}
