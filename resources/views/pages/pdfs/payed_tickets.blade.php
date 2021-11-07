<main class="ticket">
    <section class="ticket-sub">
        <h3>Admit One</h3>
        <p>No 06900666</p>
    </section>
    <section class="ticket-main">
        <section class="ticket-seat">
            <h3>Lower Box Seat <span>$30<span></h3>
            <div class="ticket-seat-box">
                <p>Section</p>
                <h4>06</h4>
            </div>
            <div class="ticket-seat-box">
                <p>Box</p>
                <h4>9</h4>
            </div>
            <div class="ticket-seat-box">
                <p>Seat</p>
                <h4>69</h4>
            </div>
        </section>
        <section class="ticket-info">
            <div class="ticket-info-brand">
                <h3>Codepen Brawl</h3>
            </div>
            <div class="ticket-info-brawler">
                <div class="brawler">
                    <span>Hila</span>
                    <span>Rious</span>
                </div>
                <div class="separator">VS</div>
                <div class="brawler">
                    <span>Biggus</span>
                    <span>Toesus</span>
                </div>
            </div>
            <div class="ticket-info-referee">
                <span>On-Ring Referee</span>
                <span>Ligma Dee</span>
            </div>
            <div class="ticket-info-date">
                <p>August 09, 6PM</p>
            </div>
            <div class="ticket-info-misc">
                <p>This ticket is fictional</p>
            </div>
        </section>
    </section>
</main>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap");

    :root {
        --color-primary: #9fa8da;
        --color-secondary: #3949ab;
        --color-tertiary: #5c6bc0;
        --color-bg: #263238;
        --font-heading: Arial, helvetica;
        --font-body: "open sans", "Roboto", sans-serif;
        --font-misc: "Oswald", "monospace", "courier";
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        backface-visibility: hidden;
    }

    body {
        background-color: var(--color-bg);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
        padding: 20px;
    }

    h3,
    h4 {
        font-family: var(--font-heading);
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .ticket {
        background-color: var(--color-primary);
        color: var(--color-secondary);
        width: 600px;
        height: auto;
        display: grid;
        grid-template-columns: 106px calc(100% - 106px);
        font-family: var(--font-body);
    }

    .ticket-sub {
        writing-mode: vertical-rl;
        text-orientation: mixed;
        text-align: center;
        padding: 10px 10px;
        border-right: 6px dotted var(--color-bg);
        position: relative;
        z-index: 1;
    }

    .ticket-sub::before,
    .ticket-sub::after {
        background-color: var(--color-bg);
        width: 22px;
        height: 22px;
        border-radius: 50%;
        content: "";
        position: absolute;
        z-index: 2;
        top: -14px;
        right: -14px;
    }

    .ticket-sub::after {
        top: unset;
        bottom: -14px;
    }

    .ticket-sub h3 {
        font-size: 30px;
        padding: 10px 8px 10px 4px;
        background: var(--color-tertiary);
        color: white;
    }

    .ticket-sub h3::before,
    .ticket-sub h3::after {
        background-color: var(--color-bg);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        content: "";
        position: absolute;
        z-index: 2;
        top: -18px;
        left: -22px;
    }

    .ticket-sub h3::after {
        top: unset;
        bottom: -18px;
    }

    .ticket-sub p {
        font-size: 18px;
        letter-spacing: 8px;
        font-weight: 500;
        padding: 14px 4px 14px 0;
        text-align: center;
    }

    .ticket-sub p::before {
        content: "";
        width: 2px;
        height: 100%;
        position: absolute;
        top: 0;
        right: calc(100% - 3px);
        border-right: dotted 5px var(--color-bg);
    }

    .ticket-sub p::after {
        content: "";
        width: calc(100% - 20px);
        height: calc(100% - 20px);
        box-shadow: inset 0 0 0 2px var(--color-secondary);
        position: absolute;
        top: 10px;
        left: 10px;
    }

    .ticket-main {
        padding: 10px;
        display: grid;
        grid-template-columns: 23% 77%;
    }

    .ticket-seat {
        display: grid;
        grid-template-areas:
            "suba head"
            "subb head"
            "subc head";
        box-shadow: inset 0 0 0 2px var(--color-secondary);
    }

    .ticket-seat>h3 {
        grid-area: head;
        height: 100%;
        writing-mode: vertical-rl;
        text-orientation: sideways;
        padding: 12px 10px 12px 2px;
        background-color: var(--color-tertiary);
        color: white;
        position: relative;
        z-index: 1;
        padding-bottom: 80px;
        border-top: 2px solid var(--color-secondary);
        border-bottom: 2px solid var(--color-secondary);
    }

    .ticket-seat>h3 span {
        position: absolute;
        bottom: 0;
        right: calc(50% + 1px);
        width: 100%;
        color: white;
        padding: 10px 4px;
        font-size: 1.6em;
        z-index: 2;
        transform: translateX(50%);
    }

    .ticket-seat>.ticket-seat-box:nth-of-type(1) {
        grid-area: suba;
    }

    .ticket-seat>.ticket-seat-box:nth-of-type(2) {
        grid-area: subb;
    }

    .ticket-seat>.ticket-seat-box:nth-of-type(3) {
        grid-area: subc;
    }

    .ticket-seat>.ticket-seat-box {
        writing-mode: vertical-rl;
        text-orientation: sideways;
        text-align: center;
    }

    .ticket-seat>.ticket-seat-box:not(:last-child) {
        border-bottom: 2px solid var(--color-secondary);
    }

    .ticket-seat>.ticket-seat-box p {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        padding-right: 4px;
    }

    .ticket-seat>.ticket-seat-box h4 {
        font-weight: 1000;
        font-size: 32px;
        line-height: 32px;
        padding-top: 6px;
    }

    .ticket-info {
        padding=left: 10px;
        text-align: center;
        display: grid;
        grid-template-areas:
            "brand"
            "brawler"
            "referee"
            "date"
            "misc";
        box-shadow: inset 0 0 0 2px var(--color-secondary);
    }

    .ticket-info>div:not(:nth-last-child(-n + 2)) {
        border-bottom: 2px dashed var(--color-secondary);
    }

    .ticket-info .ticket-info-brand {
        grid-area: brand;
        /* 	height: 50px;
 line-height: 50px; */
        align-self: center;
        padding: 0 10px 8px;
        font-size: 26px;
        border-bottom: 2px dashed var(--color-secondary);
    }

    .ticket-info .ticket-info-brawler {
        grid-area: brawler;
        display: flex;
        /* 	align-items: center; */
        width: 100%;
        margin-top: -11px;
    }

    .ticket-info .ticket-info-brawler .separator {
        writing-mode: vertical-lr;
        text-orientation: upright;
        font-weight: 1000;
        width: 40px;
        padding: 0 calc(20px - 0.8em);
        text-align: center;
        font-family: var(--font-heading);
        border-left: 2px dashed var(--color-secondary);
        border-right: 2px dashed var(--color-secondary);
    }

    .ticket-info .ticket-info-brawler .brawler {
        width: calc(50% - 20px);
        flex: 0 0 auto;
        align-self: center;
    }

    .ticket-info .ticket-info-brawler .brawler span {
        display: block;
        font-size: 16px;
        font-family: var(--font-misc);
        font-weight: bold;
        letter-spacing: 2px;
    }

    .ticket-info .ticket-info-brawler .brawler span:last-child {
        font-size: 32px;
        text-transform: uppercase;
        margin-top: -8px;
    }

    .ticket-info .ticket-info-referee {
        grid-area: referee;
        align-self: center;
        padding: 2px 8px 12px;
    }

    .ticket-info .ticket-info-referee span {
        font-size: 16px;
    }

    .ticket-info .ticket-info-referee span:last-child {
        font-size: 20px;
        font-weight: bold;
        text-transform: uppercase;
        padding-left: 10px;
        font-family: var(--font-misc);
    }

    .ticket-info .ticket-info-date {
        grid-area: date;
        font-size: 22px;
        line-height: 12px;
        padding: 24px 10px 2px;
        font-family: var(--font-heading);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        background-color: var(--color-tertiary);
        color: white;
        margin-top: -12px;
        border-left: 2px solid var(--color-secondary);
        border-right: 2px solid var(--color-secondary);
    }

    .ticket-info .ticket-info-misc {
        grid-area: misc;
        font-size: 10px;
        align-self: center;
        font-weight: 400;
        font-family: var(--font-heading);
        letter-spacing: 6px;
    }

</style>
