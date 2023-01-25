<div>
    @if ($transaction->status->status == 'On Going')
        <button wire:click="confirmEndTrans({{ $transaction->id }})"
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">End
            Transaction</button>
    @endif
</div>
