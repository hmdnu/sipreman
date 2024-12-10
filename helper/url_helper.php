<?php

function asset($path) {
    return '/public/assets/' . ltrim($path, '/');
} 