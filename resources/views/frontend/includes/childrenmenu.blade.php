<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            
            <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                @if ($value->children)
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                @endif
                {{ $value->name }}
            </a>
    
        </h4>
    </div>
    <div id="womens" class="panel-collapse collapse">
        
        <div class="panel-body">
             @if ($value->chidren)   
            <ul>
                
                @foreach ($value->children as $children)
                    <li>
                        @include('frontend.includes.childrenmenu',['value'=>$children])
                    </li>
                @endforeach
                
            </ul>
            @endif
        </div>
        
    </div>
</div>
