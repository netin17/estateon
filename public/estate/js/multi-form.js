(function ( $ ) {
  $.fn.multiStepForm = function(args) {
      if(args === null || typeof args !== 'object' || $.isArray(args))
        throw  " : Called with Invalid argument";
      var form = this;
      var tabs = form.find('.tab');
      var steps = $('.step-item'); //form.find('.step-item');
      steps.each(function(i, e){
        $(e).on('click', function(ev){
        });
      });
      form.navigateTo = function (i) {/*index*/
        /*Mark the current section with the class 'current'*/
        tabs.removeClass('current').eq(i).addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        form.find('.previous').toggle(i > 0);
        atTheEnd = i >= tabs.length - 1;
        form.find('.next').toggle(!atTheEnd);
        // console.log('atTheEnd='+atTheEnd);
        form.find('.submit').toggle(atTheEnd);
        fixStepIndicator(curIndex());
        return form;
      }
      function curIndex() {
        /*Return the current index by looking at which section has the class 'current'*/
        return tabs.index(tabs.filter('.current'));
      }
      // function fixStepIndicator(n) {
      //   steps.each(function(i, e){
      //     i == n ? $(e).addClass('active') : $(e).removeClass('active');
      //   });
      // }

      function fixStepIndicator(n) {
        steps.each(function (i, e) {
          i <= n ? $(e).addClass('step-done') : $(e).removeClass('step-done');
        });
      }

      /* Previous button is easy, just go back */
      form.find('.previous').click(function() {
        form.navigateTo(curIndex() - 1);
      });

      form.getCurrentStepIndex = function() {
        return tabs.index(tabs.filter('.current'));
      };

      /* Next button goes forward iff current block validates */
      form.find('.next').click(function() {
        if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
          if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
            ///REMOVE THIS CODE IF YOU ARE NOT USING SUMMERNOTE AND NOT WANT TO VALIDATE IT////
            var textareaField = form.find('.note-editor.note-frame.card:not(:hidden)');
      if(textareaField.length > 0){
        var summernoteValue = textareaField.find('.note-editable').html();
        console.log(summernoteValue)
        // Remove empty tags
        summernoteValue = $(summernoteValue).filter(function() {
          return this.nodeType !== 3 || $.trim(this.nodeValue) !== '';
        }).get();

        var isValueEmpty = summernoteValue.length === 0;

        if (!isValueEmpty) {
          var hasText = summernoteValue.some(function(element) {
            return element.nodeType === 3 && $.trim(element.nodeValue) !== '';
          });
          isValueEmpty = !hasText;
        }

        if (isValueEmpty) {
          var plainTextValue = textareaField.find('.note-editable').text().trim();
          if (plainTextValue === '') {
            textareaField.addClass('error'); // Add error class to indicate invalid input
            textareaField.find('.note-editable').addClass('error');
            textareaField.find('.note-error').remove();
            textareaField.append('<div class="note-error">Please enter a value.</div>'); // Add required error message
            return false;
          } else {
            textareaField.removeClass('error'); // Remove error class if it was previously added
            textareaField.find('.note-editable').removeClass('error');
            textareaField.find('.note-error').remove(); // Remove any existing error message
          }
        }

      }
            ///REMOVE up TO HEERE////
            form.validate(args.validations);
            console.log(form.valid())
            if(form.valid() == true){
              form.navigateTo(curIndex() + 1);
              return true;
            }
            return false;
          }
        }
        form.navigateTo(curIndex() + 1);
      });
      form.find('.submit').on('click', function(e){
        if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
          args.beforeSubmit(form, this);
        /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/        
        if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
          form.submit();
        }
        return form;
      });
      /*By default navigate to the tab 0, if it is being set using defaultStep property*/
      typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

      form.noValidate = function() {
        
      }
      return form;
  };
}( jQuery ));