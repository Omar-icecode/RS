@props(['number'])

@php
$serial_number = str(count($number))->length;
if($serial_number === 5){
    $serial_number = count($number) + 1;
} else if ($serial_number === 4) {
    $serial_number = "0".count($number) + 1;
} else if ($serial_number === 3) {
    $serial_number = "00".count($number) + 1;
} else if ($serial_number === 2) {
    $serial_number = "000".count($number) + 1;
} else {
    $serial_number = "0000".count($number) + 1;
}
@endphp
<div class="modal fade" id="add_marketer">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Marketer</h4>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action="/add_marketer" method="POST">
            @csrf
            <div>
              <label for="sno" class="form-label">serial no.</label>
              <input
                type="text"
                class="form-control mb-2"
                name="serial_number"
                value="{{$serial_number}}"
                readonly
                id="sno"
              />
              <p class="text-success">This is the marketer's serial number</p>
            </div>

            <div>
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                name="fullname"
                class="form-control mb-2 text-capitalize"
                id="name"
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
                class="form-control mb-2 text-capitalize"
                id="address"
                placeholder="enter contact of marketer"
              />
              @error('address') 
              <p class="text-danger text-xs mt-1">{{$message}}</p>
              @enderror
            </div>

            <input
              type="submit"
              value="Submit"
              class="btn btn-primary mt-2 form-control"
            />
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-bs-dismiss="modal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
