import { useEffect, useRef, useState } from 'react';
import ReactQuill from 'react-quill';
import 'react-quill/dist/quill.snow.css';

function BodyField(props) {
  const [body, setBody] = useState(props?.body);
  const ref = useRef(null);

  useEffect(() => {
    if (ref.current) {
      ref.current.value = props?.body || '';
    }
  }, [props?.body]);

  const handleEditorChange = (editor) => {
    setBody(editor);
    if (ref.current) {
      ref.current.value = editor;
    }
  }

  return (
    <>
      <ReactQuill
        placeholder="Описание"
        modules={{
          toolbar: [
            [{ header: [2, 3, 4, 5, 6] }],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link', 'image'],
            [{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
          ],
        }}
        formats={[
          'header',
          'font',
          'size',
          'bold',
          'italic',
          'underline',
          'strike',
          'blockquote',
          'list',
          'bullet',
          'link',
          'image',
          'video',
          'code-block',
          'align'
        ]}
        value={body}
        onChange={handleEditorChange}
      />
      <textarea ref={ref} className="visually-hidden" name="body"></textarea>
    </>
  );
}

export default BodyField;
