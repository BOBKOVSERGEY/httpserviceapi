'use strict';
document.addEventListener('DOMContentLoaded', () => {
// Example starter JavaScript for disabling form submissions if there are invalid fields
        
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        let forms = document.querySelectorAll('.needs-validation')
        
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
    
    function getDateTime() {
        let now     = new Date();
        let year    = now.getFullYear();
        let month   = now.getMonth()+1;
        let day     = now.getDate();
        let hour    = now.getHours();
        let minute  = now.getMinutes();
        let second  = now.getSeconds();
        if(month.toString().length == 1) {
            month = '0'+month;
        }
        if(day.toString().length == 1) {
            day = '0'+day;
        }
        if(hour.toString().length == 1) {
            hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
            minute = '0'+minute;
        }
        if(second.toString().length == 1) {
            second = '0'+second;
        }
        var dateTime = day+'.'+month+'.'+year+' '+hour+':'+minute+':'+second;
        return dateTime;
    }
    
    let didDateTime = false;
    let elInputDateTime = document.querySelector('#validationTooltip03');
    let currentTime = getDateTime();
    if(elInputDateTime) {
        elInputDateTime.addEventListener('click', function () {
            if (!didDateTime) {
                
                elInputDateTime.value = currentTime;
                didDateTime = true;
            }
           
        });
    }

});
