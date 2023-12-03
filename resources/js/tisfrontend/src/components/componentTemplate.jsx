import React, { useState } from 'react';

const ComponentTemplate = ({ poema }) => {

    const lorem = "Y ahora q hacemos aqui para que las cosas salgan bien porq no tenemos una base de datos normal y tenemos que ponerle de todo y asi poder conseguir algo alv xd";

    const Motivo = ({ disabled }) => {
        return (<select value = { motivo } 
                        onChange = { (event) => {
                            setMotivo(event.target.value);
                            disabledSelect();
                            console.log(motivo);} }
                        disabled = { disabled }
                >
                    <option>Motivo 1</option>
                    <option>Motivo 2</option>
                    <option>Motivo 3</option>
                    <option>Motivo 4</option>
                    <option>Motivo 5</option>
                </select>
                );}

    const Facultad = ({ disabled }) => {
        return(
            <select value = { facultad } 
                onChange = { (event) => {
                    setFacultad(event.target.value);
                    setNameimage(event.target.value);
                    console.log(facultad);} }
                disabled = { disabled }
            >
                <option value={ "https://github.com/umss/logos/blob/master/fcyt/png/x256.png?raw=true" }>Facultad 1</option>
                <option value={ "https://github.com/umss/logos/blob/master/FCE/png/FCE%20-%202d%20-%2072ppp.png?raw=true" }>Facultad 2</option>
                <option value={ "../../public/fhce-logo.jpg" }>Facultad 3</option>
                <option value={ "https://github.com/umss/logos/blob/master/FDM/png/FDM%20-%202d%20-%2072ppp.png?raw=true" }>Facultad 4</option>
                <option value={ "https://github.com/umss/logos/blob/master/fach/png/256x.png?raw=true" }>Facultad 5</option>
            </select>
        );}

    const Carrera = ({ disabled }) => {
        return(<select value = { carrera } 
                onChange = { (event) => {
                    setCarrera(event.target.value);
                    console.log(carrera);}}
                disabled = { disabled }
                >
                    <option>Carrera 1</option>
                    <option>Carrera 2</option>
                    <option>Carrera 3</option>
                    <option>Carrera 4</option>
                    <option>Carrera 5</option>
                </select>);
    }

    const Documents = () => {
        return (
            <ul>
                <li><input type='checkbox'/> · Documento a presentar 1</li>
                <li><input type='checkbox'/> · Documento a presentar 2</li>
                <li><input type='checkbox'/> · Documento a presentar 3</li>
                <li><input type='checkbox'/> · Documento a presentar 4</li>
                <li><input type='checkbox'/> · Documento a presentar 5</li>
            </ul>
        )
    }

    const [motivo, setMotivo] = useState("");
    const [facultad, setFacultad] = useState("");
    const [carrera, setCarrera] = useState("");
    
    const [test, setTest] = useState("");

    const [nameimage, setNameimage] = useState("");

    function disabledSelect() {
        if(motivo === "Motivo 1" || motivo === "Motivo 4" || motivo === "Motivo 2"){
            
        }
    }

    return (
        <div
            style={{
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "center",
            }}
        >
        <Motivo disabled={ test }/>
        <Facultad disabled={ test }/>
        <Carrera disabled={ test }/>
        
        <h1>Convocatoria a candidatura de { motivo }</h1>
        
        <img
            src="https://github.com/umss/logos/blob/master/umss/png/x256.png?raw=true"
            alt=''
            style={{ maxWidth: "60px", maxHeight: "40" }}
        />
        <img
            src= { nameimage }
            alt=''
            style={{ maxWidth: "60px", maxHeight: "40" }}
        />
        <p
            style={{
            color: "gray",
            fontStyle: "italic",
            fontSize: "10px",
            }}
        >
            {lorem}
        </p>
        <br />
        <p style={{ maxWidth: "50ch" }}>{ poema }</p>
        <Documents/>
        </div>
    );
}

export default ComponentTemplate;
