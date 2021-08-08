<div class="modal fade" id="services-modal" tabindex="-1" role="dialog" aria-labelledby="servicesModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="servicesModal">Contact Us</h5>
                <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="vol-form" action="{{ route('volunteers.registration') }}" method="POST">
                    @csrf
                    <p>
                        {{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. --}}
                    </p>
                    <div class="form-group mb-2">
                        <label for="name">Full name*</label>
                        <input name="full_name" required type="text" autocomplete="name" class="form-control" id="name"
                            placeholder="Enter name">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email address*</label>
                        <input name="email" required type="email" autocomplete="email" class="form-control" id="email"
                            placeholder="Enter email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone">Phone*</label>
                        <input name="phone" required type="tel" autocomplete="tel" class="form-control" id="phone"
                            placeholder="Phone number">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button form="vol-form" type="submit" class="btn btn-sendButton">Send</button>
            </div>
        </div>
    </div>
</div>
