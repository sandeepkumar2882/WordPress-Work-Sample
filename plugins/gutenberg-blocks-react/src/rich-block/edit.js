/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, RichText } from '@wordpress/block-editor';
const { SelectControl } = wp.components;

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
	const {attributes,setAttributes} = props;
	return (
		<p { ...useBlockProps() }>
			<RichText
				tagName="h1"
				placeholder="Write You Heading"
				value={attributes.heading}
				onChange={(headingText) => setAttributes({heading: headingText})}
			/>
			<RichText
				tagName="p"
				placeholder="Write You Content in this field"
				value={attributes.content}
				onChange={(contentText) => setAttributes({content: contentText})}
			/>
			<SelectControl
				placeholder="Select Your Domain(Technology)."
				value={attributes.selectDomain}
				options={[
					{ label: "WordPress", value: 'wordpress' },
					{ label: "JavaScript", value: 'javascript' },
					{ label: "Something else", value: 'weird_one' },
				]}
				onChange={(selectDomainValue) => setAttributes({selectDomain: selectDomainValue})}
			/>
		</p>
	);
}
