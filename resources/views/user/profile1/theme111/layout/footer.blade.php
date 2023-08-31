{{-- <footer id="footer">

        <div class="footer-all">
            <span>stay connected</span>
            <h4>example@gmail.com</h4>
        </div>
    </div>
</footer> --}}


{{-- <footer id="footer">
    <div class="copyright">
        <span style="color: white">stay connected</span>
        <h4 style="color: white">example@gmail.com</h4>
    </div>
</footer> --}}


<footer class="footer_area" style="background: blue;">
    <header class="container">
      <div class="d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column">
          <p class="about-me-para text align-self-center pt-5" >{{ $keywords['Stay_Connected'] ?? 'Stay Connected' }}</p>
          <a class="section-head text align-self-center pt-2 pb-5" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
      </div>
    </header>
</footer>


