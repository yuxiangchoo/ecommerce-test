@if ($phone = core()->getConfigData('general.general.whatsapp.whatsapp_phone_no'))

        <div id="whatsapp-drag" class="whatsapp-float" style="touch-action: none;">

                <div class="whatsapp-circle">
                    <a href="https://wa.me/{{ $phone }}" target="_blank">
                        <img src="{{ asset('vendor/whatsapp/whatsapp-icon.svg') }}" alt="WhatsApp" class="whatsapp-icon">
                    </a>
                    <span class="whatsapp-tooltip">{{ trans('whatsapp::app.whatsapp.tooltip') }}</span>
                </div>

        </div>

<style>
.whatsapp-float {
    position: fixed;
    bottom: 25px;
    right: 25px;
    z-index: 1000;
    cursor: grab;
    user-select: none;
}

.whatsapp-circle {
    width: 70px;
    height: 70px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    position: relative;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.whatsapp-circle:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.4);
}

.whatsapp-icon {
    width: 45px;
    height: 45px;
    pointer-events: none; /* allow dragging without blocking */
}

.dragging {
    opacity: 0.9;
    cursor: grabbing !important;
}

/* Optional tooltip */
        /* Fancy tooltip */
        .whatsapp-tooltip {
            visibility: hidden;
            opacity: 0;
            background-color: #25D366;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 12px;
            position: absolute;
            right: 75px; /* 距离更远一点 */
            white-space: nowrap;
            font-size: 12px;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .whatsapp-tooltip::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 100%;
            margin-top: -6px;
            border-width: 6px;
            border-style: solid;
            border-color: transparent transparent transparent #25D366;
        }

        .whatsapp-circle:hover .whatsapp-tooltip {
            visibility: visible;
            opacity: 1;
        }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const dragEl = document.getElementById("whatsapp-drag");
  const img = dragEl.querySelector("img");
  let isDragging = false;
  let offsetX = 0, offsetY = 0;

  // Prevent default image drag behavior
  img.addEventListener("dragstart", e => e.preventDefault());

  // Restore saved position
  const saved = JSON.parse(localStorage.getItem("whatsapp-position"));
  if (saved) {
    dragEl.style.left = saved.x + "px";
    dragEl.style.top = saved.y + "px";
    dragEl.style.bottom = "auto";
    dragEl.style.right = "auto";
  }

  const startDrag = (clientX, clientY) => {
    isDragging = true;
    const rect = dragEl.getBoundingClientRect();
    offsetX = clientX - rect.left;
    offsetY = clientY - rect.top;
    dragEl.classList.add("dragging");
  };

  const moveDrag = (clientX, clientY) => {
    if (!isDragging) return;

    const rect = dragEl.getBoundingClientRect();
    const elWidth = rect.width;
    const elHeight = rect.height;
    const winWidth = window.innerWidth;
    const winHeight = window.innerHeight;

    // Compute new position
    let newLeft = clientX - offsetX;
    let newTop = clientY - offsetY;

    // Limit within frame boundaries
    newLeft = Math.max(0, Math.min(newLeft, winWidth - elWidth));
    newTop = Math.max(0, Math.min(newTop, winHeight - elHeight));

    dragEl.style.left = newLeft + "px";
    dragEl.style.top = newTop + "px";
    dragEl.style.bottom = "auto";
    dragEl.style.right = "auto";
  };

  const stopDrag = () => {
    if (!isDragging) return;
    isDragging = false;
    dragEl.classList.remove("dragging");

    const rect = dragEl.getBoundingClientRect();
    localStorage.setItem("whatsapp-position", JSON.stringify({
      x: rect.left,
      y: rect.top
    }));
  };

  // Mouse
  dragEl.addEventListener("mousedown", e => {
    if (e.button !== 0) return;
    startDrag(e.clientX, e.clientY);
    e.preventDefault();
  });

  window.addEventListener("mousemove", e => moveDrag(e.clientX, e.clientY));
  window.addEventListener("mouseup", stopDrag);

  // Touch
  dragEl.addEventListener("touchstart", e => {
    const t = e.touches[0];
    startDrag(t.clientX, t.clientY);
  });

  window.addEventListener("touchmove", e => {
    const t = e.touches[0];
    if (t) moveDrag(t.clientX, t.clientY);
  });

  window.addEventListener("touchend", stopDrag);

  // Re-check bounds if window resized
  window.addEventListener("resize", () => {
    const rect = dragEl.getBoundingClientRect();
    const elWidth = rect.width;
    const elHeight = rect.height;
    const winWidth = window.innerWidth;
    const winHeight = window.innerHeight;

    let newLeft = Math.min(rect.left, winWidth - elWidth);
    let newTop = Math.min(rect.top, winHeight - elHeight);
    dragEl.style.left = Math.max(0, newLeft) + "px";
    dragEl.style.top = Math.max(0, newTop) + "px";
  });
});
</script>


@endif
