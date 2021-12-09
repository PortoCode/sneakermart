<?php

namespace App\Http\Controllers;

use App\DataTables\BuyerTransferDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBuyerTransferRequest;
use App\Http\Requests\UpdateBuyerTransferRequest;
use App\Repositories\BuyerTransferRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BuyerTransferController extends AppBaseController
{
    /** @var  BuyerTransferRepository */
    private $buyerTransferRepository;

    public function __construct(BuyerTransferRepository $buyerTransferRepo)
    {
        $this->buyerTransferRepository = $buyerTransferRepo;
    }

    /**
     * Display a listing of the BuyerTransfer.
     *
     * @param BuyerTransferDataTable $buyerTransferDataTable
     * @return Response
     */
    public function index(BuyerTransferDataTable $buyerTransferDataTable)
    {
        return $buyerTransferDataTable->render('buyer_transfers.index');
    }

    /**
     * Show the form for creating a new BuyerTransfer.
     *
     * @return Response
     */
    public function create()
    {
        return view('buyer_transfers.create');
    }

    /**
     * Store a newly created BuyerTransfer in storage.
     *
     * @param CreateBuyerTransferRequest $request
     *
     * @return Response
     */
    public function store(CreateBuyerTransferRequest $request)
    {
        $input = $request->all();

        $buyerTransfer = $this->buyerTransferRepository->create($input);

        Flash::success('Buyer Transfer saved successfully.');

        return redirect(route('buyerTransfers.index'));
    }

    /**
     * Display the specified BuyerTransfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $buyerTransfer = $this->buyerTransferRepository->find($id);

        if (empty($buyerTransfer)) {
            Flash::error('Buyer Transfer not found');

            return redirect(route('buyerTransfers.index'));
        }

        return view('buyer_transfers.show')->with('buyerTransfer', $buyerTransfer);
    }

    /**
     * Show the form for editing the specified BuyerTransfer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $buyerTransfer = $this->buyerTransferRepository->find($id);

        if (empty($buyerTransfer)) {
            Flash::error('Buyer Transfer not found');

            return redirect(route('buyerTransfers.index'));
        }

        return view('buyer_transfers.edit')->with('buyerTransfer', $buyerTransfer);
    }

    /**
     * Update the specified BuyerTransfer in storage.
     *
     * @param  int              $id
     * @param UpdateBuyerTransferRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuyerTransferRequest $request)
    {
        $buyerTransfer = $this->buyerTransferRepository->find($id);

        if (empty($buyerTransfer)) {
            Flash::error('Buyer Transfer not found');

            return redirect(route('buyerTransfers.index'));
        }

        $buyerTransfer = $this->buyerTransferRepository->update($request->all(), $id);

        Flash::success('Buyer Transfer updated successfully.');

        return redirect(route('buyerTransfers.index'));
    }

    /**
     * Remove the specified BuyerTransfer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $buyerTransfer = $this->buyerTransferRepository->find($id);

        if (empty($buyerTransfer)) {
            Flash::error('Buyer Transfer not found');

            return redirect(route('buyerTransfers.index'));
        }

        $this->buyerTransferRepository->delete($id);

        Flash::success('Buyer Transfer deleted successfully.');

        return redirect(route('buyerTransfers.index'));
    }
}
