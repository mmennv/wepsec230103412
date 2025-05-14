@extends('layouts.master')
@section('title', 'Web Crypto')
@section('content')
<div class="card m-4">
    <div class="card-body">
        <h3>Web Crypto Operations</h3>
        
        <div class="row mb-3">
            <div class="col">
                <button id="generateKeyBtn" class="btn btn-primary">Generate New Key</button>
                <span id="keyStatus" class="ms-2"></span>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Plain Text:</label>
                <textarea id="plain" class="form-control" rows="3" placeholder="Enter text to encrypt/decrypt"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button type="button" class="btn btn-primary" onclick="encryptCBC()">Encrypt</button>
                <button type="button" class="btn btn-secondary" onclick="decryptCBC()">Decrypt</button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Cipher Text:</label>
                <textarea id="cipher" class="form-control" rows="3" placeholder="Enter text to decrypt"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">IV (Base64):</label>
                <input type="text" id="ivOutput" class="form-control" readonly>
            </div>
        </div>
    </div>
</div>

<script>
let key = null;
let iv = null;

// Generate new key and IV
document.getElementById('generateKeyBtn').addEventListener('click', async function() {
    try {
        // Generate new IV
        iv = window.crypto.getRandomValues(new Uint8Array(16));
        document.getElementById('ivOutput').value = btoa(String.fromCharCode.apply(null, iv));
        
        // Generate new key
        key = await window.crypto.subtle.generateKey(
            {
                name: "AES-CBC",
                length: 256,
            },
            true,
            ["encrypt", "decrypt"]
        );
        
        document.getElementById('keyStatus').textContent = 'Key generated successfully';
        document.getElementById('keyStatus').className = 'text-success';
    } catch (error) {
        document.getElementById('keyStatus').textContent = 'Error: ' + error.message;
        document.getElementById('keyStatus').className = 'text-danger';
    }
});

// Encrypt function
function encryptCBC() {
    if (!key) {
        alert('Please generate a key first');
        return;
    }

    const plain = document.getElementById("plain");
    const cipher = document.getElementById("cipher");
    const encodedText = new TextEncoder().encode(plain.value);
    
    window.crypto.subtle.encrypt({
        name: "AES-CBC",
        iv: iv,
    }, key, encodedText)
    .then(function(encryptedData) {
        const encryptedBase64 = btoa(String.fromCharCode(...new Uint8Array(encryptedData)));
        cipher.value = encryptedBase64;
    })
    .catch(function(error) {
        alert(error);
    });
}

// Decrypt function
function decryptCBC() {
    if (!key) {
        alert('Please generate a key first');
        return;
    }

    const plain = document.getElementById("plain");
    const cipher = document.getElementById("cipher");
    try {
        const encryptedData = Uint8Array.from(atob(cipher.value), c => c.charCodeAt(0));
        window.crypto.subtle.decrypt({
            name: "AES-CBC",
            iv: iv,
        }, key, encryptedData)
        .then(function(decryptedData) {
            plain.value = new TextDecoder().decode(decryptedData);
        })
        .catch(function(error) {
            alert(error);
        });
    }
    catch(error) {
        alert(error);
    }
}
</script>
@endsection
