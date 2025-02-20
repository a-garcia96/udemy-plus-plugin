import { registerBlockType } from "@wordpress/blocks";
import {
  RichText,
  useBlockProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, ColorPalette, TextControl } from "@wordpress/components";
import { __ } from "@wordpress/i18n";
import block from "./block.json";
import "./main.css";
import icons from "../../icons";

registerBlockType(block.name, {
  icon: icons.primary,
  /* this outputs to the full site editor*/ edit: ({
    attributes,
    setAttributes,
  }) => {
    const { content, underline_color } = attributes;
    const blockProps = useBlockProps();

    return (
      <>
        <InspectorControls>
          <PanelBody title={__("Colors", "udemy-plus")}>
            <ColorPalette
              colors={[
                {
                  name: "Red",
                  color: "#f87171",
                },
                {
                  name: "Indigo",
                  color: "#818cf8",
                },
              ]}
              value={underline_color}
              onChange={(newVal) => setAttributes({ underline_color: newVal })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...blockProps}>
          <RichText
            value={content}
            tagName="h2"
            placeholder={__("Enter Heading", "udemy-plus")}
            onChange={(newVal) => setAttributes({ content: newVal })}
            className="fancy-header"
            allowedFormats={["core/bold", "core/italic"]}
          />
        </div>
      </>
    );
  },
  /* this outputs to the frontend*/ save: ({ attributes }) => {
    const { content, underline_color } = attributes;

    const blockProps = useBlockProps.save({
      className: "fancy-header",
      style: {
        "background-image": `
            linear-gradient(transparent, transparent),
            linear-gradient(${underline_color}, ${underline_color})`,
      },
    });
    return <RichText.Content {...blockProps} tagName="h2" value={content} />;
  },
});
