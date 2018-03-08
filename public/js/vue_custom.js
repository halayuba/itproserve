/*
|--------------------------------------------------------------------------
| SERVICES
|--------------------------------------------------------------------------
*/
Vue.component('services', {
  props: ['title', 'icon'],
  template: `
        <div class="col-sm-4">
            <div class="service-box scrollReveal sr-bottom sr-delay-1">
                <i :class="icon"></i>
                <h3>{{title}}</h3>
                  <ul class="ul_class">
                  <slot></slot>
                  </ul>
            </div>
        </div>
  `
});

new Vue({
  el: "#services"
});
/*
|--------------------------------------------------------------------------
| THE COMPANY
|--------------------------------------------------------------------------
*/
Vue.component('thecompany', {
  props: ['title', 'icon'],
  template: `
      <div class="col-sm-6 col-md-3">
          <div class="service-box-2 scrollReveal sr-bottom sr-delay-1">
              <h3><i :class="icon"></i> {{title}}</h3>
              <p><slot></slot></p>
          </div>
      </div>`
});

new Vue({
  el: "#company"
});
/*
|--------------------------------------------------------------------------
| CONTACT US FORM
|--------------------------------------------------------------------------
*/
new Vue({
  el: "#contact",
  data:{
    fld_name: "",
    fld_comment: "",
    // btn_disabled: true,
    flag: false,
    flag_textarea: false,
    isVisible: true
    // flag_textarea2: false
  },
  methods:{
    nameFieldValidation(){
      if(this.fld_name.length < 3){
        this.flag = true;
      }
    },
    textareaFieldValidation() {
      if(this.fld_comment.length < 6){
        this.flag_textarea = true;
      }
      // if(this.fld_comment.length > 10){
      //   this.flag_textarea2 = true;
      // }

    },
    emailFieldVaildation() {
      if(this.fld_name.length < 3){
        this.flag = true;
      }
    },
    removeMsg(item) {
      if(item == "name") this.flag = false;
      if(item == "comment") this.flag_textarea = false;
      this.isVisible = false;
    }
  },
  computed:{
    btn_disabled(){
      if(this.fld_comment.length > 10){
        return false;
      }
      return true;
    },
    field_length_remaining(){
      if(this.fld_comment.length > 0){
        remaining = 400 - this.fld_comment.length;
        if(remaining < 10 && remaining > -1){
          return "Characters remaining: " + remaining;
        }
        if(remaining < 0){
          return "You have exceeded 400 characters. Please go back and make the necessary changes or your comment will be truncated.";
        }
      }
    }

  }
})
