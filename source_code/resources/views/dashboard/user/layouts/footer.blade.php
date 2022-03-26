<footer>
    <div class="col col_first">
        <ul class="footer__list">
            <li><a href="">About Us</a></li>
            <li><a href=''>My Account</a></li>
            <li><a href={{ route('blog.index') }}>Blog</a></li>
            <li><a href={{ route('contact.create') }}>Contact us</a></li>
        </ul>
    </div>
    <div class="col col_second">
        <p>We Are Here to Help, Send to us if you need anything</p>
            <form action={{ route('contact.store') }} method="post">
            @csrf
            <div class="row">
              <div class="col-25">
                <label for="email">Email Address</label>
              </div>
              <div class="col-75">
                <input type="email" id="email" name="email" placeholder="Your email address..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="message">Message</label>
              </div>
              <div class="col-75">
                <textarea id="message" name="message" placeholder="Write something.."></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <input type="submit" value="Send">
            </div>
            </form>
          </div>
          <div class="col">
              <p class="footer__paragraph">Stay Connected</p>
              <div class="col_third">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
              </div>
          </div>
</footer>
</div>
<script src={{ asset('js/app.js') }}></script>
</body>
</html>