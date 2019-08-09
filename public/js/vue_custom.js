/*
|--------------------------------------------------------------------------
| CONTACT US FORM & MODAL
|--------------------------------------------------------------------------
*/
new Vue({
  el: "#app",
  data() {
    return {
      form: {
        name: "",
        email: "",
        comment: "",
      },
      formErrors: {
          name: '',
          email: '',
          comment: ''
      },
      modalOpen: false,
      flag: false
    }
  },
  computed:{
    formEditIsReady() {
      return ( this.form.name && this.form.email && this.form.comment )? true : false
    },
    formEditNotReady () {
      return ! this.formEditIsReady
    },
    btnState() {
      return {
        'cursor-not-allowed opacity-50': this.formEditNotReady
      }
    },
    field_length_remaining() {
      if(this.form.comment.length > 0){
        let remaining = 400 - this.form.comment.length
        if( remaining < 50 && remaining > -1 ){
          return "Characters remaining: " + remaining
        }
        if( remaining < 0 ){
          return "You have exceeded 400 characters. Please go back and make the necessary changes or your comment will be truncated.";
        }
      }
    }

  },
  methods:{
    submitForm() {
      if ( this.formEditNotReady ) {
        this.flag = true
        if ( ! this.form.name ) this.formErrors.name = "Name is a required field"
        if ( ! this.form.email ) this.formErrors.email = "Email is a required field"
        if ( ! this.form.comment ) this.formErrors.comment = "You've been very brief. Please give more details!"
      }
    },
    removeMsg(value) {
      if (value == "email") this.formErrors.email = ''
      else if (value == "name") this.formErrors.name = ''
      else if (value == "comment") this.formErrors.comment = ''
    },
    nameFieldValidation() {
      if( this.form.name.length < 3 ) this.formErrors.name = "Name is too short"
    },
    emailFieldVaildation() {
      if(this.form.email.length < 5) this.formErrors.email = "Name is too short"
    },
    textareaFieldValidation() {
      if(this.form.comment.length < 20) this.formErrors.comment = "You've been very brief. Please give more details!"
    },
    escapeKeyListener: function(evt) {
      if (evt.keyCode === 27 && this.modalOpen) {
        this.modalOpen = false;
      }
    },
    callSweetAlert() {
      swal({
          text: 'Coming Soon',
          timer: 4000,
          type: 'info'
      });
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
