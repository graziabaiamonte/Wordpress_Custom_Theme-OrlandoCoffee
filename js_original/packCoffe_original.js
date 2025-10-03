// carico solo i moduli che relmente uso
import {
  PerspectiveCamera,
  Scene,
  WebGLRenderer,
  AmbientLight,
  DirectionalLight,
  Clock,
  sRGBEncoding,
  ACESFilmicToneMapping,
} from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";
import {
  AnimationMixer,
  LoopOnce,
} from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { AnimationClip } from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";

gsap.registerPlugin(ScrollTrigger);

// Verifica se il contenitore Three.js esiste nel DOM
const threeContainer = document.getElementById("three-container");

if (!threeContainer) {
  console.log("Il contenitore 'three-container' non è presente nel DOM.");
} else {
  // Imposta la dimensione della finestra e la posizione della telecamera
  const camera = new PerspectiveCamera(
    60,
    window.innerWidth / window.innerHeight,
    0.9, // vicino
    1000 // lontano
  );
  camera.position.z = 2;

  const scene = new Scene();
  let model, mixer, clips; // Variabili per il modello e l'animazione
  let isModelLoaded = false; // Flag per controllare il caricamento del modello

  // Funzione per ottenere scala e posizione basate sulla dimensione della finestra
  function getSettingsBasedOnWindowSize() {
    return window.innerWidth <= 768
      ? { scale: 0.5, position: { x: 1, y: -1, z: 0 } }
      : { scale: 1, position: { x: 1.5, y: -1, z: 1 } };
  }

  // Caricamento del modello
  const loader = new GLTFLoader();
  loader.load(
    "https://orlandocaffe.com/wp-content/themes/tema_orlando/assets/caffe_scatole_anim.glb",
    function (gltf) {
      model = gltf.scene;
      scene.add(model);

      // Imposta scala e posizione in base alla finestra
      const settings = getSettingsBasedOnWindowSize();
      model.scale.set(settings.scale, settings.scale, settings.scale);
      model.position.set(
        settings.position.x,
        settings.position.y,
        settings.position.z
      );

      // Estrai le animazioni dal modello
      clips = gltf.animations;
      if (clips.length > 0) {
        mixer = new AnimationMixer(model);
        clips.forEach((clip) => {
          const action = mixer.clipAction(clip);
          action.setLoop(LoopOnce, 1);
          action.clampWhenFinished = true;
          action.play();
          action.paused = true;
        });
      } else {
        console.log("Nessuna animazione trovata nel modello.");
      }

      // Posiziona il modello
      model.rotation.set(1.6, -1.55, 1.5);
      camera.position.set(0, 2, 9);

      // Imposta il flag di caricamento completato
      isModelLoaded = true;

      // Configura GSAP per attivare l'animazione con lo scroll solo se il modello è caricato
      if (clips.length > 0 && mixer) {
        const action = mixer.clipAction(clips[0]);
        gsap.to(action, {
          time: action.getClip().duration,
          scrollTrigger: {
            trigger: "#intro",
            start: "top bottom",
            end: "bottom center",
            scrub: 2.5,
            markers: false,
          },
          onUpdate: () => mixer.update(0),
        });
      }
    },
    function (xhr) {
      // console.log((xhr.loaded / xhr.total) * 100 + '% caricato');
    },
    function (error) {
      console.error("Errore nel caricamento del modello", error);
    }
  );

  // Setup del renderer
  const renderer = new WebGLRenderer({ alpha: true, antialias: true });
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.outputEncoding = sRGBEncoding;
  renderer.toneMapping = ACESFilmicToneMapping;
  renderer.toneMappingExposure = 0.7;

  // Aggiunge il renderer solo se il contenitore esiste
  threeContainer.appendChild(renderer.domElement);

  // Luce
  const ambientLight = new AmbientLight(0xffffff, 0.7);
  scene.add(ambientLight);

  const topLight = new DirectionalLight(0xffffff, 0.2);
  topLight.position.set(100, 100, 100);
  scene.add(topLight);

  // Animazione
  const clock = new Clock();
  function animate() {
    if (mixer) mixer.update(clock.getDelta());
    renderer.render(scene, camera);
  }

  renderer.setAnimationLoop(animate);

  // Aggiorna il renderer alla modifica della dimensione della finestra
  window.addEventListener("resize", () => {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
  });
}

// Animazione con pack singolo funzionante (modello 3d esportato senza animazione)

// import * as THREE from 'https://cdn.skypack.dev/three@0.129.0/build/three.module.js';
// import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';

// // Imposta la dimensione della finestra e la posizione della telecamera
// const camera = new THREE.PerspectiveCamera(
//     30,
//     window.innerWidth / window.innerHeight,
//     0.1,
//     1000
// );
// camera.position.z = 23;

// const scene = new THREE.Scene();
// let model;
// const loader = new GLTFLoader();
// loader.load('wp-content/themes/tema_orlando/assets/caffe_scatola_1.glb',
//     function (gltf) {
//         model = gltf.scene;
//         scene.add(model); // Aggiungi il modello alla scena
//         console.log('Modello caricato con successo!', model);
//     },
//     function (xhr) {},
//     function (error) {
//         console.error('Errore nel caricamento del modello', error);
//     }
// );

// // Rendering setup
// const renderer = new THREE.WebGLRenderer({alpha: true, antialias: true});
// renderer.setSize(window.innerWidth, window.innerHeight);
// document.getElementById('three-container').appendChild(renderer.domElement);

// // Light
// const ambientLight = new THREE.AmbientLight(0xffffff, 1.3);
// scene.add(ambientLight);

// const topLight = new THREE.DirectionalLight(0xffffff, 1);
// topLight.position.set(100, 100, 100);
// scene.add(topLight);

// // Funzione di rendering continuo
// const reRender3D = () => {
//     requestAnimationFrame(reRender3D);
//     const scrollY = window.scrollY; // Posizione verticale dello scroll
//     const scrollFactor = 0.5; // Fattore di scaling per rallentare il movimento lungo l'asse Y
//     const rotationSpeedX = 0.002; // Velocità di rotazione sull'asse X
//     const rotationSpeedY = 0.002; // Velocità di rotazione sull'asse Y
//     const rotationSpeedZ = 0.002; // Velocità di rotazione sull'asse Z
//     const rotationX = scrollY * rotationSpeedX; // Rotazione X in base allo scroll
//     const rotationY = scrollY * rotationSpeedY; // Rotazione Y in base allo scroll
//     const rotationZ = scrollY * rotationSpeedZ; // Rotazione Z in base allo scroll

//     // Calcolo della posizione lungo l'asse Y
//     if (model) {
//         // Animare la posizione lungo l'asse Y
//         const initialY = 25; // Posizione di partenza a 100px sopra
//         const finalY = -35; // Posizione finale
//         const yPosition = THREE.MathUtils.lerp(initialY, finalY, scrollY * scrollFactor / 1000); // Lerp (Interpolazione lineare) dello scroll con fattore di rallentamento

//         model.position.y = yPosition;

//         // Controlla se ha raggiunto la posizione finale
//         if (model.position.y <= 0) {
//             // Reset delle rotazioni
//             model.position.y = 0;
//             model.rotation.x = 0;
//             model.rotation.y = 0;
//             model.rotation.z = 0;
//         } else {
//             model.rotation.x = rotationX; // Ruota l'oggetto lungo l'asse X
//             model.rotation.y = rotationY; // Ruota l'oggetto lungo l'asse Y
//             model.rotation.z = rotationZ; // Ruota l'oggetto lungo l'asse Z
//         }
//     }

//     renderer.render(scene, camera);
// };

// reRender3D();

// // Aggiorna il renderer alla modifica della dimensione della finestra
// window.addEventListener('resize', () => {
//     renderer.setSize(window.innerWidth, window.innerHeight);
//     camera.aspect = window.innerWidth / window.innerHeight;
//     camera.updateProjectionMatrix();
// });
