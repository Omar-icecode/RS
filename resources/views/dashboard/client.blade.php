<x-layout>
    <a href="/" class="btn btn-secondary btn-sm position-fixed mt-2">back</a>
    <h3 class="text-center mt-3 text-primary ">Add Client</h3>
    <form action="/add_client" class="client-form  border p-3 rounded mt-3 shadow mx-auto" method="POST">
        @csrf
        <div class="border p-2 border-2 rounded">
          <h6>Referred By</h6>
          <label for="sno" class="form-label">serial no.</label>
          <input
            type="text"
            class="form-control mb-2"
            name="referred_by"
            id="serial_number"
          />
          <label for="sno" class="form-label">
            marketer name: <span id="results"></span> 
            @if(session()->has('msg'))
              <br><span class="text-danger">{{session('msg')}}</span>
            @endif 
          </label>
        </div>

        <div class="border mt-2 p-2 border-2 rounded">
            <h6>Client details</h6>
            <div>
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                name="fullname"
                class="form-control mb-2"
                id="fullname"
                placeholder="enter name of marketer"
              />
              @error('fullname') 
              <p class="text-danger text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
    
            <div>
              <label for="contact" class="form-label">Conatct:</label>
              <input
                type="text"
                name="contact"
                class="form-control mb-2"
                id="contact"
                placeholder="enter contact of marketer"
              />
              @error('contact') 
              <p class="text-danger text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
    
            <div>
              <label for="address" class="form-label">address:</label>
              <input
                type="text"
                name="address"
                class="form-control mb-2"
                id="address"
                placeholder="enter contact of marketer"
              />
              @error('address') 
              <p class="text-danger text-xs mt-1">{{$message}}</p>
              @enderror
            </div>
    
        </div>


        <input
          type="submit"
          value="Submit"
          class="btn btn-primary mt-2 form-control"
        />
      </form>

      <script src="jquery/jquery.js"></script>
      <script>
        $(document).ready(function(){

          fetch_marketer_data();

          function fetch_marketer_data(query = '') {
            $.ajax({
              url: "{{route('livesearch')}}",
              method: 'GET',
              data: {query:query},
              dataType: 'json',

              success:function(data) {
                $('#results').html(data.marketer_name);
              },
            })
          }

          $(document).on('keyup', '#serial_number', function() {
            var query = $(this).val();
            fetch_marketer_data(query);
          })
        })
      </script>
</x-layout>