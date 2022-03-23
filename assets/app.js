
import React from 'react';
import ReactDOM from 'react-dom';

import { App }  from './components/App';


let reactRoot = document.getElementById('root2');


// Est-ce qu'il y a une balise avec id root pour démarrer React ?
if (reactRoot != undefined) {

ReactDOM.render( <App/> , reactRoot);


}

