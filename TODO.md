# TODO

- [x] Wire Settings page: add `GET /settings` and `POST /settings` routes + `settings.update` action.
- [ ] Wire Profile + Logout to ensure views render correctly with auth middleware (no missing route names).
- [ ] Fix Google Sign-In `invalid_request: missing redirect_uri` by setting Socialite redirect URL properly.
- [ ] Update homepage to show authenticated user welcome text (already present) and ensure navigation links work.
- [ ] Fix Shop collection page (`resources/views/shop.blade.php`) “Add to Cart” to store real items in `localStorage.noirCart` consistent with cart page.
- [ ] Upgrade Search page (`resources/views/search.blade.php`) advanced filters to actually filter results in the UI mock dataset.
- [ ] Ensure cart page (`resources/views/cart.blade.php`) reflects updated `localStorage.noirCart` items when Add to Cart is used from shop.


