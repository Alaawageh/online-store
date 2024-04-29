    
    <div class="email-detail-header">
        <div class="email-header-left d-flex align-items-center mb-1">
            <span class="go-back mr-1">
                <a class="feather icon-arrow-left font-medium-4" href="{{route('email.markAsRead',$email->id)}}"></a>
            
            </span>
            <h3>Order Details: {{$email->order->id}}</h3>
        </div>
        <div class="email-header-right mb-1 ml-2 pl-1">
        </div>
    </div>
    <div class="email-scroll-area">
        <div class="row">
            <div class="col-12">
                <div class="email-label ml-2 my-2 pl-1">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card px-1">
                    <div class="card-header email-detail-head ml-75">
                        <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                            <div class="avatar mr-75">
                                <img class="avatar-content" src="" alt="avtar img holder">
                            </div>
                            <div class="mail-items">
                                <h4 class="list-group-item-heading mb-0">{{$email->order?->first_name}}</h4>
                                <div class="email-info-dropup dropdown">
                                    <span class="dropdown-toggle font-small-3" id="dropdownMenuButton200" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$email->order?->email}}
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right p-50" aria-labelledby="dropdownMenuButton200">
                                        <div class="px-25 dropdown-item">From: <strong>  {{$email->order?->email}} </strong></div>
                                        <div class="px-25 dropdown-item">To: <strong> alaawajeh29@gmail.com </strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mail-meta-item">
                            <div class="mail-time mb-1">{{$email->created_at->format('H:i:s')}}</div>
                            <div class="mail-date">{{$email->created_at->format('Y.M.d')}}</div>
                        </div>
                    </div>
                    <div class="card-body mail-message-wrapper pt-2 mb-0">
                        <div class="mail-message">
                            <p><strong>Order ID:</strong> {{ $email->order->id }}</p>
                            @foreach ($email->order->products as $item)
                            <p><strong>Product Name:</strong> {{$item->name}} </p>
                            <p><strong>Product Price:</strong> {{$item->price}} </p>
                            <p><strong>Total Price:</strong> {{$item->pivot->price * $item->pivot->qty}} </p>
                            <p><strong>Product qty:</strong> {{$item->pivot->qty}} </p>
                            
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>