<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Comfirmation</div>
        <div class="panel-body">
           <h3>Hi. {{ $name }}</h3>

           <p>Your registation is completed. Please Click the button  to get access !</p>

           <a href="{{ route('confirmation', $token )}}" class="btn btn-success ">Active</a>
            

            <h4>Thank You</h4>

            <h5>Asol Vs Nokol</h5>
        </div>
    </div>
</div>