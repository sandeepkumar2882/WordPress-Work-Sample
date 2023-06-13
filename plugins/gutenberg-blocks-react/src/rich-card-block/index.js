import './style.css';
import './editor.css';
import metadata from './block.json';
import { useState } from '@wordpress/element';
import { useBlockProps } from '@wordpress/block-editor'; 
// import { MediaUpload } from "@wordpress/block-editor";

const { registerBlockType } = wp.blocks;
const { PlainText, RichText, MediaUpload } = wp.blockEditor;
const { Button, ToggleControl } = wp.components;

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

        const cardToggleControl = () => {
            const [displayCard, setDisplayCard] = useState(false);
            return (
                <div>
                    <ToggleControl
                        label="Display Card Block"
                        checked={displayCard}
                        onChange={() => {
                            setDisplayCard(!displayCard);
                        }}
                    />
                    {
                        displayCard ?
                            <div className='card-block-information'>
                                <div className='card-image-information'>
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
                                                allowedTypes={['image']}
                                                render={({ open }) =>

                                                    <Button
                                                        className="button"
                                                        onClick={open}
                                                    >
                                                        Choose An Image
                                                    </Button>
                                                }
                                            />
                                        )
                                    }
                                </div>
                                <div className='card-text-information'>
                                    <PlainText
                                        placeholder="Enter Your Card Title"
                                        className="heading"
                                        value={props.attributes.title}
                                        onChange={updatedTitle => { props.setAttributes({ title: updatedTitle }) }}
                                    />
                                    <RichText
                                        placeholder="Enter Your Card Content"
                                        className="content"
                                        multiline="p"
                                        value={props.attributes.content}
                                        onChange={updatedContent => { props.setAttributes({ content: updatedContent }) }}
                                    />
                                </div>
                            </div>
                            : ' '
                    }
                </div>
            )
        }
        return (
            <div {...useBlockProps()}>
                {cardToggleControl()}
            </div>
        );
    },
    save: function (props) {
        return (
            <div className='card-details'>
                <div className='image-wrapper'>
                    <img 
                        className='card-image'
                        src={props.attributes.imageUrl}
                        alt={props.attributes.imageAlt}
                    />
                </div>
                <div className='card-title'>
                    {props.attributes.title}
                </div>
                <div className='card-content'>
                    {props.attributes.content}
                </div>
            </div>
        )
    },
})