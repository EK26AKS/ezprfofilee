<section class="section-gap footer-section" id="footer">
  <div class="footer-div">
    @if (is_array($userPermissions) && in_array('Footer Mail', $userPermissions))
    <p class="para" style="color:white!important">{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
    <a class="section-head" href="mailto:{{ $user->email }}" style="color:white!important">{{ $user->email }}</a>
    @endif
  </div>
</section>
