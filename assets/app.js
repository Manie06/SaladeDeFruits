import React from 'react';
import ReactDOM from 'react-dom';

import { App }  from './components/App';


let reactRoot = document.getElementById('root2');


// Est-ce qu'il y a une balise avec id root pour démarrer React ?
if (reactRoot != undefined) {
    // Oui, balise trouvée, lancement de React à partir de cette balise.
    ReactDOM.render( <App/> , reactRoot);
}

console.log(reactRoot);