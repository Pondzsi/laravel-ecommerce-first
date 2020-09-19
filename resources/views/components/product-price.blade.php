<div class="price">{{ floor(number_format($price, 2, '.', '')) }}
    <sup>{{ number_format(number_format($price, 2, '.', '') - floor(number_format($price, 2, '.', '')), 2, '.', '') * 100 }}</sup>
    Lei
</div>
