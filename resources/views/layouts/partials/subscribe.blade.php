<div style="background:#111; padding: 40px; text-align: center;">
    <div style="max-width: 600px; margin: 0 auto;">
        <h2 style="color: white; font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">Stay Updated</h2>
        <p style="color: #ccc; margin-bottom: 2rem;">Get the latest insights on water efficiency and sustainability delivered to your inbox.</p>

        <form id="subscribeForm" style="display: flex; gap: 10px; justify-content: center; align-items: center;">
            @csrf
            <div style="position: relative; flex: 1; max-width: 400px;">
                <div style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #666;">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <input type="email" name="email" id="emailInput"
                    style="width: 100%; padding: 15px 15px 15px 45px; background: #222; border: 1px solid #333; border-radius: 8px; color: white; font-size: 16px; outline: none;"
                    placeholder="Enter your email address..." required>
            </div>

            <button type="submit" id="btnSubscribe"
                style="background: #00d4aa; color: white; border: none; padding: 15px 30px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.3s; font-size: 16px;">
                Subscribe
            </button>
        </form>
        <p id="subscribeError" style="color: #ff6b6b; margin-top: 10px; display: none;"></p>
    </div>
</div>

<div id="successModal" style="position: fixed; inset: 0; z-index: 50; display: none; align-items: center; justify-content: center; background: rgba(0,0,0,0.8); backdrop-filter: blur(4px);">
    <div style="background: #111; border-radius: 16px; padding: 2rem; text-align: center; max-width: 400px; width: 90%; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.3);">
        <div style="width: 64px; height: 64px; background: #00d4aa; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; color: white;">
            <i class="fa-solid fa-check" style="font-size: 2rem;"></i>
        </div>

        <h3 style="color: white; font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">Subscribed!</h3>
        <p style="color: #ccc; margin-bottom: 1.5rem;">
            Thank you for joining our newsletter. We've added <span id="successEmail" style="color: white; font-weight: 600;"></span> to our list.
        </p>

        <button type="button" id="closeModalBtn"
            style="background: #00d4aa; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background 0.3s;">
            Awesome, thanks!
        </button>
    </div>
</div>