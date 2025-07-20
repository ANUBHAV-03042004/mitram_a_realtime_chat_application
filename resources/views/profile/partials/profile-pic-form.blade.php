<section>
<!DOCTYPE html>
<html lang="en">
<body>
    <h1 class="main-header"><b>Set Up Profile</b></h1>
    <form method="post" action="{{ route('profile.add') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <!-- <div class="container">
            <div class="voltage-button">
                <div class="profile-frame">
                    <input type="file" id="galleryInput" name="image" accept="image/*" style="display: none;">
                    <img id="preview" src="{{ asset('storage/images/' . ($user->image ?? 'default_img.png')) }}">
                    <button id="selectImageBtn" class="select-image-btn">Select Image</button>
                </div>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 234.6 61.3" preserveAspectRatio="none" xml:space="preserve">
      <filter id="glow">
        <feGaussianBlur class="blur" result="coloredBlur" stdDeviation="2"></feGaussianBlur>
        <feTurbulence type="fractalNoise" baseFrequency="0.075" numOctaves="1" result="turbulence"></feTurbulence>
        <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="G" result="displace"></feDisplacementMap>
        <feMerge>
          <feMergeNode in="coloredBlur"></feMergeNode>
          <feMergeNode in="coloredBlur"></feMergeNode>
          <feMergeNode in="coloredBlur"></feMergeNode>
          <feMergeNode in="displace"></feMergeNode>
          <feMergeNode in="SourceGraphic"></feMergeNode>
        </feMerge>
      </filter>
      <path class="voltage line-1" d="m216.3 51.2c-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 6.8-7.3 6.8-3.7 0-3.7-4.6-7.3-4.6-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-0.9-7.3-0.9-3.7 0-3.7-2.7-7.3-2.7-3.7 0-3.7 7.8-7.3 7.8-3.7 0-3.7-4.9-7.3-4.9-3.7 0-3.7-7.8-7.3-7.8-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 3.1-7.3 3.1-3.7 0-3.7 10.9-7.3 10.9-3.7 0-3.7-12.5-7.3-12.5-3.7 0-3.7 4.6-7.3 4.6-3.7 0-3.7 4.5-7.3 4.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-10-7.3-10-3.7 0-3.7-0.4-7.3-0.4-3.7 0-3.7 2.3-7.3 2.3-3.7 0-3.7 7.1-7.3 7.1-3.7 0-3.7-11.2-7.3-11.2-3.7 0-3.7 3.5-7.3 3.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-2.9-7.3-2.9-3.7 0-3.7 8.4-7.3 8.4-3.7 0-3.7-14.6-7.3-14.6-3.7 0-3.7 5.8-7.3 5.8-2.2 0-3.8-0.4-5.5-1.5-1.8-1.1-1.8-2.9-2.9-4.8-1-1.8 1.9-2.7 1.9-4.8 0-3.4-2.1-3.4-2.1-6.8s-9.9-3.4-9.9-6.8 8-3.4 8-6.8c0-2.2 2.1-2.4 3.1-4.2 1.1-1.8 0.2-3.9 2-5 1.8-1 3.1-7.9 5.3-7.9 3.7 0 3.7 0.9 7.3 0.9 3.7 0 3.7 6.7 7.3 6.7 3.7 0 3.7-1.8 7.3-1.8 3.7 0 3.7-0.6 7.3-0.6 3.7 0 3.7-7.8 7.3-7.8h7.3c3.7 0 3.7 4.7 7.3 4.7 3.7 0 3.7-1.1 7.3-1.1 3.7 0 3.7 11.6 7.3 11.6 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-12.9 7.3-12.9 3.7 0 3.7 10.9 7.3 10.9 3.7 0 3.7 1.3 7.3 1.3 3.7 0 3.7-8.7 7.3-8.7 3.7 0 3.7 11.5 7.3 11.5 3.7 0 3.7-1.4 7.3-1.4 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-5.8 7.3-5.8 3.7 0 3.7-1.3 7.3-1.3 3.7 0 3.7 6.6 7.3 6.6s3.7-9.3 7.3-9.3c3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7 8.5 7.3 8.5 3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7-1.5 7.3-1.5 3.7 0 3.7 1.6 7.3 1.6s3.7-5.1 7.3-5.1c2.2 0 0.6 9.6 2.4 10.7s4.1-2 5.1-0.1c1 1.8 10.3 2.2 10.3 4.3 0 3.4-10.7 3.4-10.7 6.8s1.2 3.4 1.2 6.8 1.9 3.4 1.9 6.8c0 2.2 7.2 7.7 6.2 9.5-1.1 1.8-12.3-6.5-14.1-5.5-1.7 0.9-0.1 6.2-2.2 6.2z" fill="transparent" stroke="#fff"></path>
      <path class="voltage line-2" d="m216.3 52.1c-3 0-3-0.5-6-0.5s-3 3-6 3-3-2-6-2-3 1.6-6 1.6-3-0.4-6-0.4-3-1.2-6-1.2-3 3.4-6 3.4-3-2.2-6-2.2-3-3.4-6-3.4-3-0.5-6-0.5-3 1.4-6 1.4-3 4.8-6 4.8-3-5.5-6-5.5-3 2-6 2-3 2-6 2-3 1.6-6 1.6-3-4.4-6-4.4-3-0.2-6-0.2-3 1-6 1-3 3.1-6 3.1-3-4.9-6-4.9-3 1.5-6 1.5-3 1.6-6 1.6-3-1.3-6-1.3-3 3.7-6 3.7-3-6.4-6-6.4-3 2.5-6 2.5h-6c-3 0-3-0.6-6-0.6s-3-1.4-6-1.4-3 0.9-6 0.9-3 4.3-6 4.3-3-3.5-6-3.5c-2.2 0-3.4-1.3-5.2-2.3-1.8-1.1-3.6-1.5-4.6-3.3s-4.4-3.5-4.4-5.7c0-3.4 0.4-3.4 0.4-6.8s2.9-3.4 2.9-6.8-0.8-3.4-0.8-6.8c0-2.2 0.3-4.2 1.3-5.9 1.1-1.8 0.8-6.2 2.6-7.3 1.8-1 5.5-2 7.7-2 3 0 3 2 6 2s3-0.5 6-0.5 3 5.1 6 5.1 3-1.1 6-1.1 3-5.6 6-5.6 3 4.8 6 4.8 3 0.6 6 0.6 3-3.8 6-3.8 3 5.1 6 5.1 3-0.6 6-0.6 3-1.2 6-1.2 3-2.6 6-2.6 3-0.6 6-0.6 3 2.9 6 2.9 3-4.1 6-4.1 3 0.1 6 0.1 3 3.7 6 3.7 3 0.1 6 0.1 3-0.6 6-0.6 3 0.7 6 0.7 3-2.2 6-2.2 3 4.4 6 4.4 3-1.7 6-1.7 3-4 6-4 3 4.7 6 4.7 3-0.5 6-0.5 3-0.8 6-0.8 3-3.8 6-3.8 3 6.3 6 6.3 3-4.8 6-4.8 3 1.9 6 1.9 3-1.9 6-1.9 3 1.3 6 1.3c2.2 0 5-0.5 6.7 0.5 1.8 1.1 2.4 4 3.5 5.8 1 1.8 0.3 3.7 0.3 5.9 0 3.4 3.4 3.4 3.4 6.8s-3.3 3.4-3.3 6.8 4 3.4 4 6.8c0 2.2-6 2.7-7 4.4-1.1 1.8 1.1 6.7-0.7 7.7-1.6 0.8-4.7-1.1-6.8-1.1z" fill="transparent" stroke="#fff"></path>
    </svg>
   
    <div class="dots">
      <div class="dot dot-1"></div>
      <div class="dot dot-2"></div>
      <div class="dot dot-3"></div>
      <div class="dot dot-4"></div>
      <div class="dot dot-5"></div>
    </div>
    </div>
        </div> -->
            <h4><b>SELECT YOUR GENDER :<br></b></h4>
        <div class="radio-input">
            <input value="Male" name="gender" id="value-1" type="radio" {{ old('gender', $user->gender) === 'Male' ? 'checked' : '' }}>
            <label for="value-1">Male</label>
            <input value="Female" name="gender" id="value-2" type="radio" {{ old('gender', $user->gender) === 'Female' ? 'checked' : '' }}>
            <label for="value-2">Female</label>
            <input value="TransGender" name="gender" id="value-3" type="radio" {{ old('gender', $user->gender) === 'TransGender' ? 'checked' : '' }}>
            <label for="value-3">TransGender</label>
            <input value="Other" name="gender" id="value-4" type="radio" {{ old('gender', $user->gender) === 'Other' ? 'checked' : '' }}>
            <label for="value-4">Other</label>
        </div>
  <h4><b>SELECT DATE OF BIRTH</b></h4>
        <div class="date-input">
            <input class="ui-date" name="date_of_birth" type="date" value="{{ old('date_of_birth', $user->date_of_birth) }}">
        </div>

        <div>
            <button type="submit" class="btn-t">Add Profile</button>
            @if (session('status') === 'profile-added')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Profile Added.') }}
                </p>
            @endif
        </div>
    </form>
    <!-- <div id="previewModal" class="modal">
  <div class="modal-content">
    <img id="previewImage" src="" alt="Preview">
    <button id="addImageBtn" class="btn-c">Add</button>
      <button id="cancelImageBtn" class="btn">Cancel</button>

  </div>
</div> -->
@include('includes\update-profile-part')
<script>
// document.addEventListener('DOMContentLoaded', function() {
//   const preview = document.getElementById('preview');
//   const selectImageBtn = document.getElementById('selectImageBtn');
//   const galleryInput = document.getElementById('galleryInput');
//   const previewModal = document.getElementById('previewModal');
//   const previewImage = document.getElementById('previewImage');
//   const addImageBtn = document.getElementById('addImageBtn');
//   const cancelImageBtn = document.getElementById('cancelImageBtn');
//   const form = document.querySelector('form'); // Get the form element

//   selectImageBtn.focus();
//   selectImageBtn.addEventListener('click', function(e) {
//     e.preventDefault(); // Prevent form submission
//     galleryInput.click();
//   });

//   galleryInput.addEventListener('change', function(e) {
//     const file = e.target.files[0];
//     if (file) {
//       const reader = new FileReader();
//       reader.onload = function(e) {
//         previewImage.src = e.target.result;
//         previewModal.style.display = 'block';
//       }
//       reader.readAsDataURL(file);
//     }
//   });

//   function closeModal() {
//     previewModal.style.display = 'none';
//   }

//   addImageBtn.addEventListener('click', function() {
//     preview.src = previewImage.src;
//     closeModal();
//   });

//   cancelImageBtn.addEventListener('click', function() {
//     closeModal();
//     galleryInput.value = ''; // Clear the file input
//   });

//   window.addEventListener('click', function(event) {
//     if (event.target == previewModal) {
//       closeModal();
//     }
//   });

//   // Prevent form submission when clicking on select image button
//   form.addEventListener('submit', function(e) {
//     if (e.submitter === selectImageBtn) {
//       e.preventDefault();
//     }
//   });
// });
</script>
</body>
</html>



