// libs
const MicroModal = require('micromodal').default;
require('qrjs2');

MicroModal.init();

// Actions buttons
const btnQR = document.getElementById('btnQR');
const btnShare = document.getElementById('btnShare');

btnQR.addEventListener('click', function(e){
    e.preventDefault();
    MicroModal.show('modal-qr');
})

btnShare.addEventListener('click', function(e){
    e.preventDefault();
    MicroModal.show('modal-share');
})

// QR generate
let getField = document.getElementById.bind(document);

const profile = {
    name: getField('field-name').value,
    email: getField('field-email').value,
    description: getField('field-desc').value,
    phone: getField('field-phone').value,
    code: getField('field-code').value
}

let profileVCard = `BEGIN:VCARD
VERSION:3.0
N:${profile.name}
FN:${profile.name}
TITLE:${profile.description}
TEL;TYPE=CELL:${profile.phone}

EMAIL;TYPE=WORK:${profile.email}

URL;TYPE=WORK:${profile.code}
END:VCARD`;

let profileQR = QRCode.generateSVG(profileVCard, {
    ecclevel: "M",
    fillcolor: "#FFFFFF",
    textcolor: "#373737",
    margin: 2,
    modulesize: 1
});

let printsQR = document.getElementsByClassName('qr-area');
Array.from(printsQR).forEach(function(e) {
    e.appendChild(profileQR)
})
