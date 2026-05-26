@if (request()->routeIs('site.lawyer'))
    <footer class="site-footer compact">
        <a href="{{ url('/') }}" class="public-logo">i2<span>Medier</span></a>
        <div class="footer-text">© 2026 i2Medier Konceptz. Premium Digital Solutions.</div>
        <a href="{{ url('/') }}" class="footer-back">← Back to Main Site</a>
    </footer>
@else
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="public-logo">i2Medi<span>er</span></a>
                <p>i2Medier delivers premium web applications, scripts, and digital solutions that help businesses scale faster with cutting-edge technology.</p>
            </div>
            <div class="footer-col">
                <h5>Company</h5>
                <ul>
                    <li><a href="{{ route('site.about') }}">About Us</a></li>
                    <li><a href="{{ route('site.contact') }}">Contact</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="{{ route('site.services') }}">Services</a></li>
                    <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Legal</h5>
                <ul>
                    <li><a href="{{ route('site.terms') }}">Terms</a></li>
                    <li><a href="{{ route('site.privacy') }}">Privacy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Follow Us</h5>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">X / Twitter</a></li>
                    <li><a href="#">YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© i2Medier Konceptz 2026. All Rights Reserved.</span>
            <div class="footer-socials">
                <a href="#" title="Facebook">f</a>
                <a href="#" title="X">𝕏</a>
                <a href="#" title="YouTube">▶</a>
            </div>
        </div>
    </footer>
@endif
