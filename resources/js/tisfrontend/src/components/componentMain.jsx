import React, { useEffect, useState } from 'react';
import ComponentTemplate from './componentTemplate';
import { PDFDownloadLink, PDFViewer} from '@react-pdf/renderer';
import ComponentPDF from './componentPDF';

const ComponentMain = () => {
    
    const [poema, setPoema] = useState('');
    const [template, setTemplate] = useState(false);
    const [viewpdf, setViewPDF] = useState(false);

    function fetchPoema() {
        fetch("https://api.generadordni.es/v2/text/words")
            .then((response) => response.json())
            .then((data) => {
                setPoema(data[0]);
                console.log(data[0]);
            });
    }

    useEffect(() => {
        fetchPoema();
    }, []);

    const Menu = () => {
        return(
            <nav>
                <button onClick={ () => {
                    setTemplate(!template);
                    setViewPDF(false);
                }}>
                    { template ? "Ocultar plantilla":"Crear plantilla"}
                </button>
                <button onClick={ () => {
                    setTemplate(false);
                    setViewPDF(!viewpdf);
                }}>
                    { viewpdf ? "No ver PDF":"Ver pdf xd"}
                </button>
                <PDFDownloadLink 
                    document={ <ComponentPDF poema={ poema }/>}
                    fileName='convocatoria.pdf'
                >
                    <button>
                        Descargar PDF
                    </button>
                </PDFDownloadLink>
            </nav>
        )
    }
    return (
        <div>
            <Menu />
            { poema ? (
                <>
                    { template ? <ComponentTemplate poema={ poema }></ComponentTemplate> : null}
                    { viewpdf ? (
                        <PDFViewer>
                            <ComponentPDF poema={ poema }/>
                        </PDFViewer>
                        ) : null}
                </>
                ) : null}
        </div>
    );
}

export default ComponentMain;
