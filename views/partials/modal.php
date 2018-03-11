<div id="modal"
  v-bind:class="{ show : modalOpen }"
>

  <button class="modal-close"
    v-on:click="modalOpen = false"
  >&times;
  </button>

  <div class="modal-content">
    <h4 class="text-uppercase text-center g-line-height-1 g-font-weight-700 g-font-size-30 g-mb-20">What should expect from us</h4>

    <h5>Not only your new website will have the look and feel of a modern, professional website but you will also have ALL these features:</h5>
    
    <ol>
      <li>Eye-catching design: enjoy a new elegant and responsive user-interface. A layout that will attract more visitors to your website. All our beautiful layouts are based on the latest version of Bootstrap.</li>
      <li>Modern Tools: we use some of the best development tools of today:
        <ul>
          <li>Laravel (the most popular MVC framework for PHP)</li>
          <li>Vue (one of the most popular and a progressive JavaScript framework)</li>
          <li>HTML, CSS, Webpack, Git, Node.js and NPM. In addition to some popular open source plug-ins and libraries</li>
        </ul>
      </li>
      <li>Powerful and extensive Admin dashboard to manage the overall functionality of the site.</li>
      <li>Customer dashboard with details on all previous purchases, reviews, favorites, and other communication with the management team.</li>
      <li>We are Agile: as soon as you have a new idea or request a new customized feature, we can work together to design, develop, test, and deploy to your hosting account any new feature in a reasonably short time (we adopt incremental approach and the Agile method for project development)</li>
      <li>Improved performance: our code is optimized for fast loading and easy navigation.</li>
      <li>Improved Security: with robust secure payment gateway from some of the leaders in the industry (such as Stripe), you can have the peace of mind that your customers data will stay secure and protected.</li>
      <li>Reliable customer support: all your questions will be answered within 24 hours. You will even enjoy free training and technical support. Since we are local, we will always be close to your business when you need us.</li>
      <li>Enhancement and updates are always FREE with your monthly subscription.</li>
    </ol>
  </div>

</div>
