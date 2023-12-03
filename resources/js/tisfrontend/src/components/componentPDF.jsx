import React from 'react';
import { Document, Page, Text, View, Image} from '@react-pdf/renderer';

const ComponentPDF = ({ poema }) => {
    return (
        <Document>
            <Page
                size="A3"
                style={{
                display: "flex",
                flexDirection: "column",
                justifyContent: "center",
                alignItems: "center",
                backgroundColor: "white",
                }}
            >
                <View
                style={{
                    display: "flex",
                    flexDirection: "column",
                    justifyContent: "center",
                    alignItems: "center",
                    backgroundColor: "white",
                    padding: 10,
                }}
                >
                <Text style={{ color: "#3388af", fontSize: "42px" }}>
                </Text>
                
                <Image
                    src="https://picsum.photos/600/400"
                    alt="random image"
                    style={{ maxWidth: "600px", maxHeight: "400" }}
                />
                <Text style={{ textAlign: "justify", marginTop: "22px" }}>
                    { poema }
                </Text>
                </View>
            </Page>
        </Document>
    );
}

export default ComponentPDF;
