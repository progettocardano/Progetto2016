Cookie = {
    // Number of days before the cookie expires, and the banner reappears
    cookieDuration : 14,

    // Name of our cookie
    cookieName: 'complianceCookie',

    // Value of cookie
    cookieValue: 'on',

    // Message banner title
    bannerTitle: "Cookies:",

    // Message banner message
    bannerMessage: "Navigando in questo sito accetti di conseguenza l'utilizzo dei cookie.",

    // Message banner dismiss button
    bannerButton: "OK",

    // Link to your cookie policy.
    bannerLinkURL: "/legal-docs/data-protection.html",

    // Link text
    bannerLinkText: "Approfondisci",

    createDiv: function () {
        var banner = $(
            '<div class="alert alert-success alert-dismissible fade in" ' +
            'role="alert" style="position: fixed; bottom: 0; width: 100%; ' +
            'margin-bottom: 0"><strong>' + this.bannerTitle + '</strong> ' +
            this.bannerMessage + ' <a href="' + this.bannerLinkURL + '">' +
            this.bannerLinkText + '</a> <button type="button" class="btn ' +
            'btn-success" onclick="Cookie.createCookie(Cookie.cookieName, Cookie.cookieValue' +
            ', Cookie.cookieDuration)" data-dismiss="alert" aria-label="Close">' +
            this.bannerButton + '</button></div>'
        );
        $("body").append(banner);
    },

    createCookie: function(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toGMTString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    },

    checkCookie: function(name) {
        var nameEQ = name + "="
        var ca = document.cookie.split(';')
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ')
                c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) 
                return c.substring(nameEQ.length, c.length);
        }
        return null;
    },

    init: function() {
        if (this.checkCookie(this.cookieName) != this.cookieValue)
            this.createDiv();
    }
}