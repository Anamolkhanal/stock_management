<?php

namespace app\Http\Controllers;

use Response;
use Laracasts\Flash\Flash;
use App\Helpers\APIHelpers;
use App\Models\Requisition;
use Illuminate\Http\Request;
use App\Repositories\WordRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Product;
use App\Repositories\RequisitionRepository;

class RequisitionController extends AppBaseController
{
    /** @var  WordRepository */
    private $requisitionRepository;

    public function __construct(RequisitionRepository $requisitionRepo)
    {   
        $this->requisitionRepository = $requisitionRepo;
    }

    /**
     * Display a listing of the requisition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $requisitions = $this->requisitionRepository->paginate(10);

        return view('requisitions.index')
            ->with('requisitions', $requisitions);
    }

    /**
     * Show the form for creating a new requisition.
     *
     * @return Response
     */
    public function create()
    {
        return view('requisitions.create');
    }

    /**
     * Store a newly created requisition in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $requisition=new Requisition();
        $requisition->user_id=$request->user_id;
        $requisition->product_id=$request->product_id;
        $requisition->description=$request->description;
        $requisition->quantity=$request->quantity;
        $requisition->mode=$request->mode;
        $requisition->remarks=$request->remarks;
            if($requisition->mode=="In"){
                $product =Product::find($request->product_id);
                $product->quantity=$product->quantity+$request->quantity;
                $product->total=$product->price*$request->quantity;
                $product->save();
            }elseif($requisition->mode=="Out"){
                $product =Product::find($request->product_id);
                if($product->quantity>=$request->quantity){
                    $product->quantity=$product->quantity-$request->quantity;
                    $product->total=$product->price*$request->quantity;
                    $product->save();
                }
                else{
                    Flash::success('Not enough Quantity');
                    return redirect(route('requisitions.index'));
                }
            }
        $requisition_save=$requisition->save();
        if($requisition_save){
            Flash::success('Requisition saved successfully.');
            return redirect(route('requisitions.index'));
        //   $response=APIHelpers::createAPIResponse(false, 201, 'Requisition Added Successfully',null);
        //   return redirect(route('requisitions.index'))->response()->json($response,200);
        }else{
            $response=APIHelpers::createAPIResponse(true, 400, 'Requisition Creation Failed',null);
            return redirect(route('requisitions.index'))->response()->json($response,400);
        }
    }

    /**
     * Display the specified requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.show')->with('requisition', $requisition);
    }

    /**
     * Show the form for editing the specified requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.edit')->with('requisition', $requisition);
    }

    /**
     * Update the specified requisition in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('requisition not found');

            return redirect(route('requisitions.index'));
        }

        $requisition = $this->requisitionRepository->update($request->all(), $id);

        Flash::success('requisition updated successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Remove the specified requisition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('requisition not found');

            return redirect(route('requisitions.index'));
        }

        $this->requisitionRepository->delete($id);

        Flash::success('requisition deleted successfully.');

        return redirect(route('requisitions.index'));
    }
} 