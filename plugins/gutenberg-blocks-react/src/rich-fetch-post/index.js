import './editor.css';
import './style.css';
import { useState } from '@wordpress/element';
// import { decodeEntities } from '@wordpress/html-entities';

const { registerBlockType } = wp.blocks;
const { withSelect } = wp.data;
const { ToggleControl } = wp.components;
// const { useState } = wp.element;

registerBlockType('rich-block/rich-fetch-post', {
    title: "Fetch Post List",
    icon: 'images-alt2',
    category: 'common',

    edit: withSelect((select) => {
        return (
            {
                posts: select('core').getEntityRecords('postType', 'post'),
                categories: select('core').getEntityRecords('taxonomy', 'category')
            }
        )
    })
        (
            // posts = posts.replace(/(<([^>]+)>)/ig, ''),
            ({ posts, className }) => {
                if (!posts) {
                    return (
                        <p className={className}>Loading...</p>
                    );
                }
                if (posts.length === 0) {
                    return (
                        <p className={className}>No Posts</p>
                    );
                }
                const myToggleControl = () => {
                    const [displayPosts, setDisplayPosts] = useState(false);
                    return (
                        <div>
                            <ToggleControl
                                label="Display Posts"
                                checked={displayPosts}
                                onChange={() => {
                                    setDisplayPosts(!displayPosts);
                                }}
                            />
                            {
                                displayPosts ?
                                    <ul className={className}>
                                        {posts.map((post, index) => {
                                            return (
                                                <div>
                                                    <li>
                                                        {/* {post.author_info.display_name} */}
                                                        <a href={post.link}>
                                                            {post.title.rendered}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        {post.content.rendered.replace(/(<([^>]+)>)/ig, '')}
                                                    </li>
                                                    <img
                                                    src={post.featured_image_src}
                                                    />
                                                </div>
                                            )
                                        })}
                                    </ul>
                                    : ' '
                            }
                        </div>
                    )
                };
                return (
                    <div>
                        {myToggleControl()}
                    </div>
                )
            })
})