<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class RequestController extends Controller
{
    // لحفظ الطلب
    public function store(Request $request) 
    {
        // التحقق من صحة المدخلات
        $validated = $request->validate([
            'buyer' => 'required|exists:users,id',
            'seller' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'offer_ratio' => 'nullable|numeric|min:0' 
        ]);
    
        $requestData = [
            'buyer' => $request->buyer,
            'seller' => $request->seller,
            'product_id' => $request->product_id,
            'offer_ratio' => $request->offer_ratio,
            'is_sale' => 0 // الطلب لم يُوافق عليه بعد
        ];
       // التحقق مما إذا كان المستخدم يحاول طلب المنتج من نفسه
    if ($request->buyer == $request->seller) {
        return redirect()->back()->with('error', 'لا يمكنك طلب منتج من نفسك!');
    }

    // التحقق مما إذا كان المستخدم قد طلب نفس المنتج من نفس البائع من قبل
    $existingRequest = RequestModel::where('buyer', $request->buyer)
                                   ->where('seller', $request->seller) // التحقق من البائع أيضًا
                                   ->where('product_id', $request->product_id)
                                   ->first();

    if ($existingRequest) {
        return redirect()->back()->with('error', 'You have already pre-ordered this product from this seller!');
    }
        // إنشاء الطلب في قاعدة البيانات
        $request = RequestModel::create($requestData);
    
        return redirect()->back()->with('success', 'Your request has been sent');
    }

    // لاستعراض الطلبات الخاصة بالمستخدم
    public function userRequests()
    {
        // طلبات الشراء الخاصة بالمستخدم
        $buyingRequests = RequestModel::where('buyer', auth()->id())
            ->with(['product', 'seller_user'])
            ->get();
        
        // طلبات البيع الخاصة بالمستخدم
        $sellingRequests = RequestModel::where('seller', auth()->id())
            ->with(['product', 'buyer_user'])
            ->get();

        return view('profile.request', compact('buyingRequests', 'sellingRequests'));
    }

    // لعرض الطلبات من قبل البائع
    public function index()
    {
        $requests = RequestModel::where('seller', Auth::id())
            ->where('is_sold', 0) // الطلبات التي لم تُباع بعد
            ->get();

        return view('requests.index', compact('requests'));
    }

    public function accept($id)
    {
        $request = RequestModel::findOrFail($id);
        
        // التحقق من أن المستخدم هو البائع
        if ($request->seller !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $request->update([
            'is_sale' => 1
        ]);
    
        return redirect()->back()->with('success', 'Request accepted successfully');
    }
    
    public function reject($id)
    {
        $request = RequestModel::findOrFail($id);
        
        // التحقق من أن المستخدم هو البائع
        if ($request->seller !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $request->delete();
    
        return redirect()->back()->with('success', 'Request rejected successfully');
    }
}
