import React from 'react';

export class App  extends React.Component {

state = 
{
  cities: [],           // liste des villes ( vient de la BDD (back))
  city: ''  ,           // Déclaration des villes
  suggestion :''        // Déclaration 
};

//Méthode appelé automatiquement par React aprés le premier render()

componentDidMount() 
{
    window.fetch('/api_data')
        .then(function(response)
        {
            return response.json();
        })
        .then((villes) =>
        {
            this.setState({ cities : villes });
        });
    

}

// Les gestionnaires d'évenements sont crées en fonction fléchée afin de converser l'acces au "this" de la classe.
  onChangeInput = (event) => {
    
    let suggestions = [];



    // Si la valeur est vide, la ville s'affiche, et quand on efface, sa revient a vide.
    if(event.target.value === '' )
    {
      this.setState(
        { 
        city : event.target.value,
        suggestion : ''
        });

      return;
    }

    // Parcours de toutes les villes à la recherche de la saisie
    for(let city of this.state.cities)
      {
      // Ect-ce que la ville contient la saisie ?
      if (city.includes(event.target.value.toLowerCase()) === true ) 
      //if (city.startWith(event.target.value.toLowerCase()) === true ) 
      // startsWith --> Commence par la saisie ! 
      {
        // Oui, enregistrement de la ville dans les suggestions
        suggestions.push(city);
      }
       
    }
    console.table(suggestions);

    // sa réinjecte la saisie dans city
    this.setState({ 
      city : event.target.value,
      suggestion : suggestions.join()
    });

  }

  render() { // obligatoire 
  
      return (
          <div className="App">
            <header className="App-header">
              
      
              <label htmlFor='city'>Quelle ville ?? </label>
              <input type="text" id="city" value = {this.state.city} onChange={ this.onChangeInput} /> 
              <p>{ this.state.suggestion }</p>   

            </header>
          </div>
        );
    }
  
}

export default App;