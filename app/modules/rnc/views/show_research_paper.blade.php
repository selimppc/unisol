<!-- Show cart info    -->

@if ( 4 ==  Auth::user()->get()->role_id)
    @if(isset($rnc_research_papers))
      <div>
          <a href="{{ URL::route('student.research-paper.view-cart') }}" class="pull-right btn button-large bg-danger" title="View Cart"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
          <strong class="img-circle"><span class="label label-primary">{{count($rnc_research_papers)}}</span></strong></a>
      </div>

    @endif



@elseif( 2 ==  Auth::user()->get()->role_id )

    @if(isset($rnc_research_papers))
      <div>
            <a href="{{ URL::route('faculty.research-paper.view-cart') }}" class="pull-right btn button-large bg-danger" title="View Cart"  style="color: navy" ><i class="fa fa-large fa-shopping-cart"></i>
            <strong class="img-circle"><span class="label label-primary">{{count($rnc_research_papers)}}</span></strong></a>
      </div>
    @endif

@endif

