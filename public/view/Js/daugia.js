
$(document).ready(function () {
  $.fn.countDown = function() {
    if(!this[0].hasAttribute('data-inited')) {
        this.attr('data-inited', new Date().getTime())
        var $elm = this
        var remainTime =  this.data('endat') || new Date().getTime()       
        var onComplete = this.attr('oncomplete') 
        var $ihours = $('<span>').addClass('hours')
        var $iminutes = $('<span>').addClass('minutes')
        var $iseconds = $('<span>').addClass('seconds')
        this.append($ihours).append('<span class="cdSapce">:</span>').append($iminutes).append('<span class="cdSapce">:</span>').append($iseconds);

        var timer = setInterval(function() {
          var now = new Date().getTime()
          var distance = remainTime - now;

          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))+ days * 24;
          if(hours <10){hours = '0'+ hours;}
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          if(minutes < 10){minutes = '0'+minutes;}
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          if(seconds < 10){seconds = '0'+seconds;}

          $ihours.html(hours);
          $iminutes.html(minutes);
          $iseconds.html(seconds);

          if (distance < 0) {
             clearInterval(timer)
             $elm.html("Kết thúc")
             if(onComplete) {
              eval(onComplete)
             }
          }
        }, 1000);
    }
    return this
  }

  $('div[rel=countdown]').each(function(){$(this).countDown()})
  window.auctionComplete = function(productId) {}
  window.login = function() {    
    var action = "/index.php?mod=account&task=check_login&ajax";  
    $.ajax({ url: action,
         data: {
            userName:frmLogin.userName.value,
            passWord:frmLogin.passWord.value,
            currentUrl:frmLogin.currentUrl.value,
         },
         type: 'post',
         success: function(output) {
            resp = JSON.parse(output);
            if(resp.success)
            {
              window.location.href = frmLogin.currentUrl.value;
            }
            else
            {
              $("#errMessage").html(resp.message);
            }
        }
    });
    return false;
  }
  window.regAccount = function() {    
    var action = "/index.php?mod=account&task=regAccount&ajax";      
    $.ajax({ url: action,
         data: {
            userName:frmRegister.userName.value,
            password:frmRegister.password.value,
            confirmPassword:frmRegister.confirmPassword.value,
            fullName:frmRegister.fullName.value,
         },
         type: 'post',
         success: function(output) {
            resp = JSON.parse(output);
            if(resp.success)
            {
              $("#message").html("Vào chỗ nào");
              $("#userCheck").html(resp.mes_user);
              return false;              
            }
            else
            {
              $("#message").html(resp.mes_pas1);
              $("#userCheck").html(resp.mes_user);
              return false;
            }
        }
    });
    return false;
  }
   $('.btnAuction').click(function(){
    var action = "/index.php?mod=product&task=AuctionSession&ajax"; 
    var _currentUrl = $('#hdnCurrentUrl').val();
    var _currentPrice = $('#currentPrice').val().replace(/[^0-9\s]/gi, '');
    var _sessionId = $('#hdnSessionId').val().replace(/[^0-9\s]/gi, '');
    var _productId = $('#hdnProductId').val().replace(/[^0-9\s]/gi, '');
    //gọi the la vào dc mà. Uh nhung ko biết POST data đúng ko?
    $.ajax({ url: action,
         data: {
            productId:_productId,
            sessionId:_sessionId,
            currentPrice:_currentPrice,
         },
         type: 'post',
         success: function(output) {
            resp = JSON.parse(output);
            if(resp.success)
            {
              window.location.href = _currentUrl;             
            }
            else
            {
              $("#okkk").html(resp.message);
              return false;
            }
        }
    });
    return false;
  });
});

//Function Add
$(document).ready(function () {
  $('#stepAdd').click(function(){
    var _iprice = $('#hdnPrice').val().replace(/[^0-9\s]/gi, '');
    var _currentPrice = $('#currentPrice').val().replace(/[^0-9\s]/gi, '');
    var _stepPrice = $('#hdnPriceStep').val();
    var _total = parseInt(_currentPrice) + parseInt(_stepPrice);
    if(_iprice >= _total)
    {
      var _totalAdd = _total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + " đ";
      $("#currentPrice").val(_totalAdd);
    }
    else
      alert("Lớn hơn giá gốc");
  });
  $('#stepSub').click(function(){
     var _winnerPrice = $('#hdnWinnerPrice').val().replace(/[^0-9\s]/gi, '');
    var _currentPrice = $('#currentPrice').val().replace(/[^0-9\s]/gi, '');
    var _stepPrice = $('#hdnPriceStep').val();
    var _subTotal = parseInt(_currentPrice) - parseInt(_stepPrice);
    if(_subTotal >= _winnerPrice)
    {
      _subTotal = _subTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + " đ";
      $("#currentPrice").val(_subTotal);
    }
    else
      alert("Bước giá nhỏ hơn hiện tại");
  });
});
$(document).ready(function () {
  /** code by webdevtrick (https://webdevtrick.com) **/
  $('.openmodal').click(function (e) {
           e.preventDefault();
           $('.modal').addClass('opened');
      });
  $('.closemodal').click(function (e) {
           e.preventDefault();
         $('.modal').removeClass('opened');
    });
});


$(document).ready(function(){
  $('.tab-wrapper .tab li a').on('click', function (event) {
      event.preventDefault();          
      $('.active').removeClass('active');
      $(this).parent().addClass('active');
      $('.tab-content .tab-item').hide();
      $($(this).attr('href')).show();
    });
});

