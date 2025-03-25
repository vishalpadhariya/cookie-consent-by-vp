document.addEventListener("DOMContentLoaded", function () {
    let banner = document.getElementById("ccvp-gdpr-ccpa-cookie-banner");
    let message = document.getElementById("ccvp-gdpr-ccpa-message");
    let acceptBtn = document.getElementById("ccvp-gdpr-ccpa-accept");
    let declineBtn = document.getElementById("ccvp-gdpr-ccpa-decline");

    message.textContent = ccvp_consent_data.message;
    acceptBtn.textContent = ccvp_consent_data.acceptText;
    declineBtn.textContent = ccvp_consent_data.declineText;

    if (!document.cookie.includes("ccvp_consent_cookie")) {
        banner.classList.remove("ccvp-gdpr-ccpa-hidden");
    }

    acceptBtn.addEventListener("click", function () {
        document.cookie = "ccvp_consent_cookie=accepted; max-age=" + (ccvp_consent_data.expiryDays * 86400) + "; path=/";
        banner.style.display = "none";
    });

    declineBtn.addEventListener("click", function () {
        document.cookie = "ccvp_consent_cookie=declined; max-age=" + (ccvp_consent_data.expiryDays * 86400) + "; path=/";
        banner.style.display = "none";
    });
});
