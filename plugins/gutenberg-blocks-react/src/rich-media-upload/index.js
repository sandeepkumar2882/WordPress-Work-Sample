import './style.css';
import metadata from './block.json';
import { useState } from '@wordpress/element';
import { useBlockProps } from '@wordpress/block-editor'; 
// import { MediaUpload } from "@wordpress/block-editor";

const { registerBlockType } = wp.blocks;
const { MediaUpload } = wp.blockEditor;
const { Button } = wp.components;

registerBlockType(metadata.name, {

    edit: function (props) {

        const [state, changeState] = useState(false);

        const onFileSelect = (img) => {
            props.setAttributes({
                imageUrl: img.url,
                imageId: img.id,
                imageAlt: img.alt
            });
        }

        const onRemoveImage = () => {
            props.setAttributes({
                imageUrl: null,
                imageId: null,
                imageAlt: null
            });
        }
        // console.log(metadata.attributes);
        return (
            <div {...useBlockProps()}>
                {
                    (props.attributes.imageUrl) ? (
                        <div className='image-upload-wrapper'>
                            <img
                                src={props.attributes.imageUrl}
                                alt={props.attributes.imageAlt}
                                onClick={() => changeState(!state)}
                            />
                            {state ? (
                                <div className="remove-button">
                                    <Button
                                        onClick={onRemoveImage}
                                    >
                                        Remove Image {console.log("remove")}
                                    </Button>
                                </div>
                            ) : console.log(null)}
                        </div>
                    ) : (
                        <MediaUpload
                            onSelect={onFileSelect}
                            value={props.attributes.imageId}
                            render={({ open }) =>

                                <Button
                                    className="button"
                                    onClick={open}
                                >
                                    Open Library
                                </Button>
                            }
                        />
                    )
                }

            </div>
        );
    },
    save: function (props) {
        return (
            <div className='image-wrapper'>
                <img
                    src={props.attributes.imageUrl}
                    alt={props.attributes.imageAlt}
                />
            </div>
        )
    },
})