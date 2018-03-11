/*
|--------------------------------------------------------------------------
| CONTACT US FORM & MODAL
|--------------------------------------------------------------------------
*/
new Vue({
  el: "#app",
  data:{
    fld_name: "",
    fld_comment: "",
    // btn_disabled: true,
    flag: false,
    flag_textarea: false,
    isVisible: true,
    modalOpen: false
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
    },
    escapeKeyListener: function(evt) {
      if (evt.keyCode === 27 && this.modalOpen) {
        this.modalOpen = false;
      }
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

  },
  watch: {
    modalOpen: function() {
      var className = 'modal-open';
      if (this.modalOpen) {
        document.body.classList.add(className);
      } else {
        document.body.classList.remove(className);
      }
    }
  },
  created: function() {
    document.addEventListener('keyup', this.escapeKeyListener);
  },
  destroyed: function () {
    document.removeEventListener('keyup', this.escapeKeyListener);
  }

})
