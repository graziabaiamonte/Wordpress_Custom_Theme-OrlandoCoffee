import {
  PerspectiveCamera as e,
  Scene as t,
  WebGLRenderer as n,
  AmbientLight as i,
  DirectionalLight as o,
  Clock as r,
  sRGBEncoding as a,
  ACESFilmicToneMapping as s,
} from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { GLTFLoader as l } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";
import {
  AnimationMixer as d,
  LoopOnce as p,
} from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { AnimationClip as c } from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
gsap.registerPlugin(ScrollTrigger);
let threeContainer = document.getElementById("three-container");
if (threeContainer) {
  let $ = new e(60, window.innerWidth / window.innerHeight, 0.9, 1e3);
  $.position.z = 2;
  let h = new t(),
    m,
    f,
    u,
    g = !1;
  function _() {
    return window.innerWidth <= 768
      ? { scale: 0.5, position: { x: 1, y: -1, z: 0 } }
      : { scale: 1, position: { x: 1.5, y: -1, z: 1 } };
  }
  let x = new l();
  x.load(
    "https://orlandocaffe.com/wp-content/themes/tema_orlando/assets/caffe_scatole_anim.glb",
    function (e) {
      (m = e.scene), h.add(m);
      let t = _();
      if (
        (m.scale.set(t.scale, t.scale, t.scale),
        m.position.set(t.position.x, t.position.y, t.position.z),
        (u = e.animations).length > 0
          ? ((f = new d(m)),
            u.forEach((e) => {
              let t = f.clipAction(e);
              t.setLoop(p, 1),
                (t.clampWhenFinished = !0),
                t.play(),
                (t.paused = !0);
            }))
          : console.log("Nessuna animazione trovata nel modello."),
        m.rotation.set(1.6, -1.55, 1.5),
        $.position.set(0, 2, 9),
        (g = !0),
        u.length > 0 && f)
      ) {
        let n = f.clipAction(u[0]);
        gsap.to(n, {
          time: n.getClip().duration,
          scrollTrigger: {
            trigger: "#intro",
            start: "top bottom",
            end: "bottom center",
            scrub: 2.5,
            markers: !1,
          },
          onUpdate: () => f.update(0),
        });
      }
    },
    function (e) {},
    function (e) {
      console.error("Errore nel caricamento del modello", e);
    }
  );
  let k = new n({ alpha: !0, antialias: !0 });
  k.setPixelRatio(window.devicePixelRatio),
    k.setSize(window.innerWidth, window.innerHeight),
    (k.outputEncoding = a),
    (k.toneMapping = s),
    (k.toneMappingExposure = 0.7),
    threeContainer.appendChild(k.domElement);
  let w = new i(16777215, 0.7);
  h.add(w);
  let y = new o(16777215, 0.2);
  y.position.set(100, 100, 100), h.add(y);
  let z = new r();
  function b() {
    f && f.update(z.getDelta()), k.render(h, $);
  }
  k.setAnimationLoop(b),
    window.addEventListener("resize", () => {
      k.setSize(window.innerWidth, window.innerHeight),
        ($.aspect = window.innerWidth / window.innerHeight),
        $.updateProjectionMatrix();
    });
} else
  console.log("Il contenitore 'three-container' non \xe8 presente nel DOM.");
