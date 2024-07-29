var ALERT_TITLE = "Alert!";
            var ALERT_BUTTON_TEXT = "Ok";
              if (document.getElementById) {
                window.alert = function (txt) {
                    createCustomConfirm(txt);
                }
            }

            function createCustomConfirm(txt) {
                d = document;

                if (d.getElementById("modalContainer"))
                    return;

                mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
                mObj.id = "modalContainer";
                mObj.style.height = d.documentElement.scrollHeight + "px";

                confirmObj = mObj.appendChild(d.createElement("div"));
                confirmObj.id = "alertBox";
                if (d.all && !window.opera)
                    confirmObj.style.top = document.documentElement.scrollTop + "px";
                confirmObj.style.left = (d.documentElement.scrollWidth - confirmObj.offsetWidth) / 2 + "px";
                confirmObj.style.visiblity = "visible";

                h1 = confirmObj.appendChild(d.createElement("h1"));
                h1.appendChild(d.createTextNode(ALERT_TITLE));

                msg = confirmObj.appendChild(d.createElement("p"));
                //msg.appendChild(d.createTextNode(txt));
                msg.innerHTML = txt;

                btn = confirmObj.appendChild(d.createElement("a"));
                btn.id = "okBtn";
                btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
                btn.href = "javascript:;";
                btn.focus();
                btn.onclick = function () {
                    removeCustomConfirm();

                    return true;

                }
             
       confirmObj.style.display = "block";

            }

            function removeCustomConfirm() {
                document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
            }