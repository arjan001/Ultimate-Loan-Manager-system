@extends('core::layouts.master')
@section('title')
    {{ trans_choice('loan::general.transaction',1) }}  {{ trans_choice('core::general.detail',2) }}
@endsection
@section('content')
    <div class="nk-block-head-content mb-4">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">{{ trans_choice('loan::general.transaction',1) }}  {{ trans_choice('core::general.detail',2) }}</h3>
                    <div class="nk-block-des text-soft">

                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <a href="{{url('loan/transaction/'.$loan_transaction->id.'/pdf')}}" target="_blank"
                       class="btn btn-info btn-sm">{{ trans_choice('core::general.pdf',1) }}</a>
                    <a href="{{url('loan/transaction/'.$loan_transaction->id.'/print')}}" target="_blank"
                       class="btn btn-info btn-sm">{{ trans_choice('core::general.print',1) }}</a>
                    <a href="#" onclick="window.history.back()"
                       class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                        <em class="icon ni ni-arrow-left"></em><span>{{ trans_choice('core::general.back',1) }}</span>
                    </a>

                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div>
    </div>
    <div class="nk-block nk-block-lg" id="app">
        <div class="card card-bordered card-preview">
            <div class="card-inner">

                <table class="table  table-bordered table-hover table-striped" id="">
                    <tbody>
                    <tr>
                        <td>{{ trans_choice('core::general.id',1) }}</td>
                        <td>{{$loan_transaction->id}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans_choice('core::general.type',1) }}</td>
                        <td>
                            @if($loan_transaction->loan_transaction_type_id == 1)
                                {{trans_choice('loan::general.disbursement',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 2)
                                {{trans_choice('loan::general.repayment',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 3)
                                {{trans_choice('loan::general.contra',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 4)
                                {{trans_choice('loan::general.waive',1)}} {{trans_choice('loan::general.interest',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 5)
                                {{trans_choice('loan::general.repayment',1)}} {{trans_choice('core::general.at',1)}} {{trans_choice('loan::general.disbursement',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 6)
                                {{trans_choice('loan::general.write_off',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 7)
                                {{trans_choice('loan::general.marked_for_rescheduling',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 8)
                                {{trans_choice('loan::general.recovery',1)}} {{trans_choice('loan::general.repayment',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 9)
                                {{trans_choice('loan::general.waive',1)}} {{trans_choice('loan::general.charge',2)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 10)
                                {{trans_choice('loan::general.fee',1)}} {{trans_choice('loan::general.applied',1)}}
                            @endif
                            @if($loan_transaction->loan_transaction_type_id == 11)
                                {{trans_choice('loan::general.interest',1)}} {{trans_choice('loan::general.applied',1)}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans_choice('core::general.date',1) }}</td>
                        <td>{{$loan_transaction->submitted_on}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans_choice('core::general.amount',1) }}</td>
                        <td>
                            {{number_format($loan_transaction->amount,$loan_transaction->loan->decimals)}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>{{ trans_choice('core::general.payment',1) }} {{ trans_choice('core::general.detail',2) }}</b>
                        </td>
                    </tr>
                    @if(!empty($loan_transaction->payment_detail))
                        <tr>
                            <td>{{ trans_choice('core::general.payment',1) }} {{ trans_choice('core::general.type',1) }}</td>
                            <td>
                                @if(!empty($loan_transaction->payment_detail->payment_type))
                                    {{$loan_transaction->payment_detail->payment_type->name}}
                                @endif
                            </td>
                        </tr>
                        @if(!empty($loan_transaction->payment_detail->account_number))
                            <tr>
                                <td>{{ trans_choice('core::general.account',1) }}#</td>
                                <td>
                                    {{$loan_transaction->payment_detail->account_number}}
                                </td>
                            </tr>
                        @endif
                        @if(!empty($loan_transaction->payment_detail->cheque_number))
                            <tr>
                                <td>{{ trans_choice('core::general.cheque',1) }}#</td>
                                <td>
                                    {{$loan_transaction->payment_detail->cheque_number}}
                                </td>
                            </tr>
                        @endif
                        @if(!empty($loan_transaction->payment_detail->routing_code))
                            <tr>
                                <td>{{ trans_choice('core::general.routing_code',1) }}</td>
                                <td>
                                    {{$loan_transaction->payment_detail->routing_code}}
                                </td>
                            </tr>
                        @endif
                        @if(!empty($loan_transaction->payment_detail->receipt))
                            <tr>
                                <td>{{ trans_choice('core::general.receipt',1) }}#</td>
                                <td>
                                    {{$loan_transaction->payment_detail->receipt}}
                                </td>
                            </tr>
                        @endif
                        @if(!empty($loan_transaction->payment_detail->bank_name))
                            <tr>
                                <td>{{ trans_choice('core::general.bank',1) }}#</td>
                                <td>
                                    {{$loan_transaction->payment_detail->bank_name}}
                                </td>
                            </tr>
                        @endif
                        @if(!empty($loan_transaction->payment_detail->description))
                            <tr>
                                <td>{{ trans_choice('core::general.description',1) }}</td>
                                <td>
                                    {{$loan_transaction->payment_detail->description}}
                                </td>
                            </tr>
                        @endif
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection